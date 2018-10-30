<?php

namespace App\Repositories;

use App\Repositories\HouseRepository;
use App\Repositories\GolRepository;
use App\Repositories\CityRepository;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MessageRepository;
use App\Repositories\CertsRepository;
use Config;
use Log;
use Overtrue\EasySms\EasySms;

use App\Models\AttentionHouse;

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
     public function __construct(
        HouseRepository $houseRepo,
        GolRepository $golRepo,
        CityRepository $cityRepo,
        PostRepository $postRepo,
        CategoryRepository $categoryRepo,
        MessageRepository $messageRepo,
        CertsRepository $certsRepo
    ){
        $this->houseRepository = $houseRepo;
        $this->golRepository = $golRepo;
        $this->cityRepository = $cityRepo;
        $this->postRepository = $postRepo;
        $this->categoryRepository = $categoryRepo;
        $this->messageRepository = $messageRepo;
        $this->certsRepository = $certsRepo;
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
        $user_house = AttentionHouse::where('user_id',$user_id)->where('house_id',$house_id)->first();
        return $user_house ? true : false;
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
            return zcjy_callback_data($attach_word.'未认证',1,$api_type);
        }

        if($cert->status == '审核中' || $cert->status =='未通过'){
            return zcjy_callback_data($attach_word.'认证审核中或未通过审核',1,$api_type);
        }
        return $status;
    }

  
}
