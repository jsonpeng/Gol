<?php

namespace App\Repositories;

use App\Repositories\HouseRepository;
use App\Repositories\GolRepository;

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
     public function __construct(HouseRepository $houseRepo,GolRepository $golRepo){
        $this->houseRepository = $houseRepo;
        $this->golRepository = $golRepo;

     }

     public function houseRepo(){
        return $this->houseRepository;
     }

     public function golRepo(){
        return $this->golRepository;
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


  
}
