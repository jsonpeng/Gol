<?php

namespace App\Repositories;

use App\Repositories\HouseRepository;
use App\Repositories\GolRepository;
use App\Repositories\CityRepository;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MessageRepository;
use App\Repositories\CertsRepository;
use App\Repositories\HouseJoinRepository;
use App\Repositories\BannerRepository;
use App\Repositories\GolServicesRepository;

use Config;
use Log;
use Overtrue\EasySms\EasySms;

use App\Models\AttentionHouse;
use App\Models\HouseJoin;
use App\Models\AttentionGol;
use App\Models\UserZichangLog;
 
/**
 * Class ClientRepository
 * @package App\Repositories
 * @version December 26, 2017, 10:08 am CST
 *
 * @method Client findWithoutFail($id, $columns = ['*'])
 * @method Client find($id, $columns = ['*'])
 * @method Client first($columns = ['*'])
*/
class CommonRepository 
{
 
     private $houseRepository;
     private $golRepository;
     private $cityRepository;
     private $postRepository;
     private $categoryRepository;
     private $messageRepository;
     private $certsRepository;
     private $houseJoinRepository;
     private $bannerRepository;
     private $golServicesRepository;
     public function __construct(
        HouseRepository $houseRepo,
        GolRepository $golRepo,
        CityRepository $cityRepo,
        PostRepository $postRepo,
        CategoryRepository $categoryRepo,
        MessageRepository $messageRepo,
        CertsRepository $certsRepo,
        HouseJoinRepository $houseJoinRepo,
        BannerRepository $bannerRepo,
        GolServicesRepository $golServicesRepo
    ){
        $this->houseRepository = $houseRepo;
        $this->golRepository = $golRepo;
        $this->cityRepository = $cityRepo;
        $this->postRepository = $postRepo;
        $this->categoryRepository = $categoryRepo;
        $this->messageRepository = $messageRepo;
        $this->certsRepository = $certsRepo;
        $this->houseJoinRepository = $houseJoinRepo;
        $this->bannerRepository = $bannerRepo;
        $this->golServicesRepository = $golServicesRepo;
     }

     public function golServicesRepo(){
        return $this->golServicesRepository;
     }

     public function bannerRepo(){
        return $this->bannerRepository;
     }

     public function houseJoinRepo(){
        return $this->houseJoinRepository;
     }

     public function certsRepo(){
        return $this->certsRepository;
     }

     public function messageRepo(){
        return $this->messageRepository;
     }

     public function categoryRepo(){
        return $this->categoryRepository;
     }

     public function postRepo(){
        return $this->postRepository;
     }

     public function houseRepo(){
        return $this->houseRepository;
     }

     public function golRepo(){
        return $this->golRepository;
     }

     public function cityRepo(){
        return $this->cityRepository;
     }

     /**
      * [用户的资产记录]
      * @param  [type] $user_id [description]
      * @return [type]          [description]
      */
     public function userZichanLogs($user_id)
     {
        $logs = UserZichangLog::where('user_id',$user_id)
                ->orderBy('created_at','desc')
                ->paginate(15);
        return $logs;
     }

     //支付结束资产转入后
     public function endPayZichan($out_trade_no)
     {
        $log = UserZichangLog::where('number',$out_trade_no)->first();
        if(!empty($log)){
            $user = $log->user;
            if(!empty($user)){
                #更新用户资产
                $user->update(['zichan'=>round($user->zichan+$log->change,2)]);
                #处理订单记录
                $log->update(['status'=>'处理完成']);
                return true;
            }
        }
        return false;
     }

     //生成资产日志
     public function generateZichanLog($type='转入',$price,$user_id,$name=null,$account=null)
     {
        $detail = $type.$price.'元';
        $log = UserZichangLog::create(
            [
                'type'=>$type,
                'change'=>$price,
                'user_id'=>$user_id,
                'detail'=>$detail,
                'status'=>$type=='转入'?'未支付':'处理中',
                'name'=>$name,
                'account'=>$account
        ]
        );
        $log->update([
            'number' => time().'_'.$log->id
        ]);
        return $log;
     }

     //统计
     public function staticsHouse(){
        $all_joins = HouseJoin::where('pay_status','已支付')->orderBy('created_at','desc');
        $all_houses = $this->houseRepo()->allHouses();
        #累计支持金额
        $all_price = $all_joins->sum('price');
        #单项最高支持金额
        $one_max_price = optional($all_houses->sortByDesc('all_price')->first())->all_price;
        #累计支持人数
        $all_support_num = $all_joins->count();
        #单项最高支持人数
        $one_max_num = optional($all_houses->sortByDesc('support_people')->first())->support_people;
        return (object)[
            'all_price'=>$all_price,
            'one_max_price'=>$one_max_price,
            'all_support_num'=>$all_support_num, 
            'one_max_num'=>$one_max_num,

        ];
     }

     /**
      * [用户关注的小屋]
      * @param  [type] $user_id [description]
      * @return [type]          [description]
      */
     public function userAttentionHouses($user_id)
     {
        $user_houses = AttentionHouse::where('user_id',$user_id)->orderBy('created_at','desc')->get();
        $house_arr = []; 
        if(count($user_houses)){
            foreach ($user_houses as $key => $val) {
               $house_arr[] = $val->house_id;
            }
        }
        return $this->houseRepo()->model()::whereIn('id',$house_arr)
        ->where('status','<>','审核中')
        ->orderBy('created_at','desc')
        ->paginate(15);
     }

     /**
      * [用户关注的gol]
      * @param  [type] $user_id [description]
      * @return [type]          [description]
      */
     public function userAttentionGols($user_id)
     {
        $user_houses = AttentionGol::where('user_id',$user_id)->orderBy('created_at','desc')->get();
        $house_arr = []; 
        if(count($user_houses)){
            foreach ($user_houses as $key => $val) {
               $house_arr[] = $val->gol_id;
            }
        }
        return $this->golRepo()->model()::whereIn('id',$house_arr)
        ->where('publish_status','<>',0)
        ->orderBy('created_at','desc')
        ->paginate(15);
     }


     /**
      * [检查一下用户对小屋的关注状态]
      * @param  [type] $user_id  [description]
      * @param  [type] $house_id [description]
      * @return [type]           [description]
      */
     public function varifyHouseAttentionStatus($user_id,$house_id)
     {
         return AttentionHouse::where('user_id',$user_id)->where('house_id',$house_id)->first();
     }


     /**
      * [检查一下用户对小屋的关注状态]
      * @param  [type] $user_id  [description]
      * @param  [type] $house_id [description]
      * @return [type]           [description]
      */
     public function varifyGolAttentionStatus($user_id,$gol_id)
     {
         return AttentionGol::where('user_id',$user_id)->where('gol_id',$gol_id)->first();
     }


     /**
      * 关注/取消关注 gol
      * @param  [type] $user_id [description]
      * @param  [type] $gol_id  [description]
      * @return [type]          [description]
      */
     public function attentionGol($user_id,$gol_id)
     {
        if(empty($this->golRepo()->findWithoutFail($gol_id))){
              return zcjy_callback_data('该gol已删除或不存在',1);
        }

        $user_gol  = $this->varifyGolAttentionStatus($user_id,$gol_id);

        if($user_gol){
            $user_gol->delete();
            return zcjy_callback_data('取消关注成功');
        }
        else{
            AttentionGol::create([
                'user_id'=>$user_id,
                'gol_id'=>$gol_id
            ]);
            return zcjy_callback_data('关注gol成功');
        }

     }

     /**
      * [关注/取消关注 小屋]
      * @param  [type] $user_id  [description]
      * @param  [type] $house_id [description]
      * @return [type]           [description]
      */
     public function attentionHouses($user_id,$house_id)
     {
        if(empty($this->houseRepo()->findWithoutFail($house_id))){
              return zcjy_callback_data('该小屋已删除或不存在',1);
        }
        $user_house = $this->varifyHouseAttentionStatus($user_id,$house_id);
        if(!empty($user_house)){
            $user_house->delete();
            return zcjy_callback_data('取消关注成功');
        }
        else{
            AttentionHouse::create([
                'user_id'=>$user_id,
                'house_id'=>$house_id
            ]);
            return zcjy_callback_data('关注小屋成功');
        }
     }

    //发送短信验证码
    public function sendVerifyCode($mobile)
    {
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'aliyun',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'aliyun' => [
                    'access_key_id' => Config::get('web.SMS_ID'),
                    'access_key_secret' => Config::get('web.SMS_KEY'),
                    'sign_name' => Config::get('web.SMS_SIGN'),
                ]
            ],
        ];

        $easySms = new EasySms($config);

        $code = rand(1000,9999);

        $easySms->send($mobile, [
            'content'  => '短信验证码:'.$code,
            'template' => Config::get('web.SMS_TEMPLATE_VERIFY'),
            'data' => [
                'code'=>$code
            ],
        ]); 
        session(['mobile_code_reg'.$mobile=>$code]);
        return $code;   
    }
    
    /**
     * [用户的认证状态]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function authCert($user)
    {
        return $user->cert()->orderBy('created_at','desc')->first();
    }

    /**
     * [检查认证]
     * @param  [type] $user        [description]
     * @param  string $attach_word [description]
     * @param  string $api_type    [description]
     * @return [type]              [description]
     */
    public function varifyCert($user,$attach_word='您当前',$api_type="web"){
        if(empty($user)){
            return zcjy_callback_data('未知错误',1,$api_type);
        }
        $status = false;
        $cert = $this->authCert($user);
        if(empty($cert)){
            return zcjy_callback_data($attach_word.'未认证,请在个人中心完成身份认证后使用',1,$api_type);
        }

        if($cert->status == '审核中' || $cert->status =='未通过'){
            return zcjy_callback_data($attach_word.'认证正在审核中或未通过审核',1,$api_type);
        }
        return $status;
    }


    /**
     * [检查商户认证状态]
     * @param  [type] $user        [description]
     * @param  string $attach_word [description]
     * @param  string $api_type    [description]
     * @return [type]              [description]
     */
    public function vairyfyShanghuCert($user,$attach_word='您当前',$api_type="web"){
        if(empty($user)){
            return zcjy_callback_data('未知错误',1,$api_type);
        }

        #先检查普通身份认证状态
        $authcert = $this->varifyCert($user);

        if($authcert){
            return $authcert;
        }   

        #接着检查商户认证状态
        $status = false;
        $cert = $user->shanghucert;

        if(empty($cert)){
            return zcjy_callback_data($attach_word.'未认证,请在个人中心完成商户认证后使用',1,$api_type);
        }

        if($cert->status == '审核中' || $cert->status =='未通过'){
            return zcjy_callback_data($attach_word.'商户认证正在审核中或未通过审核',1,$api_type);
        }

        return $status;
    }

  
}
