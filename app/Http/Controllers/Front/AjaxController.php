<?php
namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Hash;
use Mail;
use Illuminate\Support\Facades\Input;

use App\Models\HouseBoard;
use App\Models\AttachHouseBoard;

class AjaxController extends Controller
{

    //上传文件
    public function uploadFile(Request $request)
    {
        $file =  Input::file('file');
        return uploadFiles($file);
    }

    /**
     *发送邮箱验证码
     */
    public function sendEmailCode(Request $request,$type='reg'){
            $email=$request->input('email');
            $code=rand(1000,9999);
            $name = empty(getSettingValueByKeyCache('company_name')) ? 'gol公司' : getSettingValueByKeyCache('company_name');
            if(!empty($email)){
                 if($type == 'reg'){
                      if(User::where('email',$email)->count()){
                        return zcjy_callback_data('该用邮箱已被注册,请重新换个邮箱',1);
                      }
                    //保存验证码到session中去
                    session()->put('email_code_'.$request->ip(),$code);
                  }
                  else{
                    session()->put('email_code_'.$type.'_'.$request->ip(),$code);
                  }
                
                  Mail::send('emails.index',['name'=>$name,'code'=>$code],function($message) use ($email,$name){ 
                    $to = $email;
                    $message ->to($to)->subject('【'.$name.'】邮箱验证码');
                  });
                return zcjy_callback_data('发送成功');
            }
            else{
            return zcjy_callback_data('请输入邮箱',1);
          }
    }

    //发送手机验证码
    public function sendMobileCode(Request $request)
    {
        $input = $request->all();
        $varify = varifyInputParam($input,['mobile']);
        if($varify){
            return zcjy_callback_data($varify,1);
        }
        #如果已经有用户注册过该手机号
        if(User::where('mobile',$input['mobile'])->count())
        {
            return zcjy_callback_data('该手机号已经被注册过',1);
        }
        $code = app('common')->sendVerifyCode($input['mobile']);
        return zcjy_callback_data($code);
    }

    //手机号注册
    public function regMobile(Request $request)
    {
        $input = $request->all();
        $varify = varifyInputParam($input,['mobile','mobile_code']);

        if($varify){
            return zcjy_callback_data($varify,1);
        }

        #如果已经有用户注册过该手机号
        if(User::where('mobile',$input['mobile'])->count())
        {
            return zcjy_callback_data('该手机号已经被注册过',1);
        }   

        #验证session
        if(session('mobile_code_reg'.$input['mobile']) != $input['mobile_code'])
        {
            return zcjy_callback_data('手机验证码错误',1);
        }

        #新建一个用户
        $user = User::create([
            'name'=>generateMobileUserName($input['mobile']),
            'mobile'=>$input['mobile'],
            'password'=>Hash::make($input['mobile'])
        ]);

        #并且把用户对象存到session中去
        session(['mobile_reg_user'.$request->ip()=>$user]);

        return zcjy_callback_data('注册成功,请继续完善更多信息使用');

    }

    //用户注册
    public function regUser(Request $request)
    {
        $input = $request->all();
        $varify = varifyInputParam($input,['name','email','password','code']);
        if($varify){
            return zcjy_callback_data($varify,1);
        }
        if(User::where('email',$input['email'])->count()){
            return zcjy_callback_data('该邮箱已被注册,请重新换个邮箱',1);
        }
        if(User::where('name',$input['name'])->count()){
            return zcjy_callback_data('该用户名已被注册,请重新取个用户名',1);
        }
        if(session('email_code_'.$request->ip()) != $input['code']){
            return zcjy_callback_data('邮箱验证码错误,请重新输入',1);
        }

        $input['password'] = Hash::make($input['password']);
        #从session中取出用户
        $user=session('mobile_reg_user'.$request->ip());
        #更新用户
        $user->update($input);
        #登录下
        auth('web')->login($user);
        return zcjy_callback_data('注册用户成功');
    }

    //更新用户接口
    public function updateUserApi(Request $request)
    {
        $input = $request->all();

        $user = auth('web')->user();
        if(array_key_exists('head_image', $input)){
            if(empty($input['head_image'])){
                return zcjy_callback_data('请先上传选择图片',1);
            }
        }
        $user->update($input);
        return zcjy_callback_data('更新成功');
    }

    //用户登陆
    public function loginUser(Request $request)
    {
        $input = $request->all();
        $varify = varifyInputParam($input,['name','password']);
        if($varify){
            return zcjy_callback_data($varify,1);
        }
        $name_user = User::where('name',$input['name'])->first();
        /**
         * 通过用户名或者邮箱都可以登陆
         */
        #用户名
        if(!empty($name_user)){
            if(!Hash::check($input['password'],$name_user->password)){
                return zcjy_callback_data('密码输入错误',1);
            }
            auth('web')->login($name_user);
            $this->updateUserInfo($name_user,$request);
            return zcjy_callback_data('登陆成功');
        }
        #邮箱
        $email_user = User::where('email',$input['name'])->first();
        if(!empty($email_user)){
            if(!Hash::check($input['password'],$email_user->password)){
                return zcjy_callback_data('密码输入错误',1);
            }
            auth('web')->login($email_user);
            $this->updateUserInfo($email_user,$request);
            return zcjy_callback_data('登陆成功');
        }
        #手机号
        $mobile_user = User::where('mobile',$input['name'])->first();
        if(!empty($mobile_user)){
            if(!Hash::check($input['password'],$mobile_user->password)){
                return zcjy_callback_data('密码输入错误',1);
            }
            auth('web')->login($mobile_user);
            $this->updateUserInfo($mobile_user,$request);
            return zcjy_callback_data('登陆成功');
        }

        if(empty($name_user) || empty($email_user) || empty($mobile_user)){
            return zcjy_callback_data('账号或者密码错误',1);
        }

    }

    //更新用户信息 上次ip和上次登录时间
    private function updateUserInfo($user,$request){
        $user->update([
            'last_login' => Carbon::now(),
            'last_ip' => $request->ip()
        ]);
    }

    //退出当前用户
    public function logoutUser(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        return zcjy_callback_data('退出成功');
    }

    //管理员给单个用户发通知消息
    public function sendOneUserNoticeAdmin(Request $request,$user_id)
    {
        $input = $request->all();
        $varify = varifyInputParam($input,['content']);
        if($varify){
            return zcjy_callback_data($varify,1);
        }
        app('notice')->sendNoticeToUser($user_id,$input['content']);
        return zcjy_callback_data('发送成功');
    }

    //用户给单个用户发私信
    public function sendOneUserNoticeSiXin(Request $request,$user_id)
    {
        $input = $request->all();
        $varify = varifyInputParam($input,['content']);
        if($varify){
            return zcjy_callback_data($varify,1);
        }
        app('notice')->sendNoticeToUser($user_id,$input['content'],auth('web')->user());
        return zcjy_callback_data('发送成功');
    }



    //给所有用户发通知消息
    public function sendAllUserNotice(Request $request)
    {
        $input = $request->all();
        $varify = varifyInputParam($input,['content']);
        if($varify){
            return zcjy_callback_data($varify,1);
        }
        app('notice')->sendNoticeToAllUser($input['content']);
        return zcjy_callback_data('发送成功');
    }

    //设置单条通知消息为已读
    public function setNoticeReaded(Request $request,$id)
    {
        app('notice')->setNoticeReadById($id);
        return zcjy_callback_data('已读成功');
    }

    //发布我的小屋
    public function authHousePublish(Request $request)
    {
        $user = auth('web')->user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        app('common')->houseRepo()->model()::create($input);  
        return zcjy_callback_data('发布成功'); 
    }

    //发布gol
    public function authGolPublish(Request $request)
    {
        $user = auth('web')->user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        if(array_key_exists('services',$input)){
          #处理空格和换行符
          $input['services'] = preg_replace("/\r\n|\s+/",'',$input['services']);
        }
        app('common')->golRepo()->model()::create($input);  
        return zcjy_callback_data('发布成功');
    }

    //存储参与小屋提交选择参数
    public function saveHouseJoinParam(Request $request,$type="join")
    {
        $input = $request->all();
        #验证字段
        $varify = varifyInputParam($input,'price,gear,gear_num,house_id,body');
        if($varify){
            return zcjy_callback_data($varify,1);
        }
        $user = auth('web')->user();
        $input['user_id'] = $user->id;
        $input['price'] = round($input['price'],2);
        $request->session()->flash('gol_house_'.$type.'_'.$user->id,$input);
        //session(['gol_house_join_'.$user->id=>$input]);
        return zcjy_callback_data('存储参数成功');
    }

    //参与小屋支付
    public function joinHousePay(Request $request,$house_id)
    {


    }

  
    /**
     * 发起实名认证
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function certsPublish(Request $request){
        $input = $request->all();
        #验证字段
        $varify = varifyInputParam($input,'name,id_card,face_image,back_image,hand_image,current_image_src');
        if($varify){
            return zcjy_callback_data($varify,1);
        }
        #当前用户
        $user = auth('web')->user();
        #处理数据类型
        if(!is_array($input['current_image_src'])){
            $input['current_image_src'] = explode(',',$input['current_image_src']);
        }
        /*
        #身份证正面
        $face_image_varify = app('commonRepo')->dealCardImage($input['current_image_src'][0]);
        #身份证反面
        $back_image = app('commonRepo')->dealCardImage($input['current_image_src'][1],2);
        #手持身份证
        $hand_image_varify = app('commonRepo')->dealCardImage($input['current_image_src'][2]);
        if($face_image_varify['msg'] == 'success' && $back_image['msg'] && $hand_image_varify['msg'] == 'success'){
            #检查身份证正反面和名字对不对得上
            if($face_image_varify['data']['number'] != $input['id_card'] || $face_image_varify['data']['name'] != $input['name'] || $hand_image_varify['data']['number'] != $input['id_card'] || $hand_image_varify['data']['name'] != $input['name']){
                return zcjy_callback_data('身份信息验证失败,请重新上传认证',1,'web');
            }
            #检查身份证有效期
            if(\Carbon\Carbon::parse($back_image['data']['end_date'])->lt(\Carbon\Carbon::now())){
                return zcjy_callback_data('身份证件已过期,请重新上传认证',1,'web');
            }
        }   
        else{
             return zcjy_callback_data('身份信息验证失败,请重新上传认证',1,'web');
        }
        #更新信息
        
        $input['status'] = '已通过';
        */
        $input['user_id'] = $user->id;
        #添加认证记录
        app('common')->certsRepo()->create($input);
        return zcjy_callback_data('我们已收到您的实名认证记录,请等待审核通过',0,'web');
    }

    // 发起小屋 关注/取消关注
    public function attentionHouses(Request $request,$house_id)
    {
        $user = auth('web')->user();
        return app('common')->attentionHouses($user->id,$house_id);
    }

    //发起gol 关注/取消关注
    public function attentionGol(Request $request,$gol_id)
    {
        $user = auth('web')->user();
        return app('common')->attentionGol($user->id,$gol_id);
    }

    //发布小屋评论
    public function publishHouseComment(Request $request)
    {
         $input = $request->all();
         $user = auth('web')->user();
         if(!array_key_exists('content',$input) || array_key_exists('content',$input) && empty($input['content'])){
            return zcjy_callback_data('请输入留言内容',1);
         }
         $input['user_id'] = $user->id;
         #普通留言 没有回复人
         if(!array_key_exists('reply_user_id',$input)){
               HouseBoard::create([
                    'user_id'=>$input['user_id'],
                    'content'=>$input['content'],
                    'house_id'=>$input['house_id'],
                    'type'=>$input['type']
               ]);
             
         }
         #待回复的留言 回复已经发过的留言
         else{
                $comment = AttachHouseBoard::create([
                        'content' => $input['content'],
                        'message_id' => $input['message_id'],
                        'user_id' => $input['user_id'],
                        'reply_user_id' => $input['reply_user_id']
                ]);
                #给回复人通知
                app('notice')->sendUserNotice($input['reply_user_id'],$input['user_id'],'board','回复',['type'=>1,'comment_id'=>$comment->id]);
        }

        return zcjy_callback_data('发起留言成功');
    }



}