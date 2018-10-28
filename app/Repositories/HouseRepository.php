<?php

namespace App\Repositories;

use App\Models\House;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HouseRepository
 * @package App\Repositories
 * @version October 14, 2018, 11:25 pm CST
 *
 * @method House findWithoutFail($id, $columns = ['*'])
 * @method House find($id, $columns = ['*'])
 * @method House first($columns = ['*'])
*/
class HouseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'content',
        'view',
        'gear',
        'type',
        'target',
        'status',
        'endtime'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return House::class;
    }

    //我的小屋
    public function myHourses($user_id)
    {
        return House::where('user_id',$user_id)
                ->orderBy('created_at','desc')
                ->paginate(15);
    }

    //正在参与中的小屋
    public function nowJoinHouses($skip=0,$take=20)
    {
        $hourses = House::where('status','已发布')
               ->with('join')
               ->orderBy('created_at','desc')
               ->skip($skip)
               ->take($take)
               ->get();
        $hourses = $this->dealHoursesPrice($hourses);
        return $hourses;
    }

    //即将结束的小屋
    public function isEndHouses($skip=0,$take=20)
    {
        $hourses = House::where('status','已发布')
               ->with('join')
               ->orderBy('created_at','asc')
               ->skip($skip)
               ->take($take)
               ->get();
        $hourses = $this->dealHoursesPrice($hourses);
        return $hourses;
    }

    //即将上架的
    public function forSaleHouses($skip=0,$take=20)
    {
        $hourses = House::where('status','已完成')
               ->with('join')
               ->orderBy('created_at','asc')
               ->skip($skip)
               ->take($take)
               ->get();
        $hourses = $this->dealHoursesPrice($hourses);
        return $hourses;
    }


    //处理多个房子的价格
    private function dealHoursesPrice($hourses)
    {
        if(count($hourses))
        {
            foreach ($hourses as $key => $val) {
                $val = $this->dealJoins($val);
            }
        }
        return $hourses;
    }

    //处理单个房子的进度
    private function dealJoins($hourse)
    {
        #总金额
        $price = 0;
   
        #支持人数
        $support_people = 0;

        if(isset($hourse['join']) && count($hourse['join'])){
            foreach ($hourse['join'] as $key => $val) {
                ++$support_people;
                $price += $val->price;
            }
        }

        #进度
        $progress = $price/$hourse->target > 1 ? 100 : $price/$hourse->target*100;
        $hourse['all_price'] =  $price;
        $hourse['support_people'] =  $support_people;
        $hourse['progress'] =  $progress;
        return $hourse;
    }

    public function getHouses($type=null,$skip=0,$take=20)
    {
        return House::where('status','<>','审核中')
               ->orderBy('created_at','desc')
               ->skip($skip)
               ->take($take)
               ->get();
    }

    //获取小屋详情
    public function getHouseDetail($id)
    {
        $hourse = $this->findWithoutFail($id);

        if(empty($hourse)){
            return '没有找到该小屋';
        }
        $hourse = $this->dealJoins($hourse);
        return (object)['hourse'=>$hourse];
    }




}
