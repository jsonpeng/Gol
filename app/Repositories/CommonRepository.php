<?php

namespace App\Repositories;

use App\Repositories\HouseRepository;
use App\Repositories\GolRepository;
use App\Repositories\CityRepository;
use Config;
use Log;
use Overtrue\EasySms\EasySms;

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
     public function __construct(HouseRepository $houseRepo,GolRepository $golRepo,CityRepository $cityRepo){
        $this->houseRepository = $houseRepo;
        $this->golRepository = $golRepo;
        $this->cityRepository = $cityRepo;
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
        $cert = $user->cert()->first();
        if(empty($cert)){
            return zcjy_callback_data($attach_word.'未认证',1,$api_type);
        }

        if($cert->status == '审核中' || $cert->status =='未通过'){
            return zcjy_callback_data($attach_word.'认证审核中或未通过审核',1,$api_type);
        }
        return $status;
    }

  
}
