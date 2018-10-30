<?php

namespace App\Repositories;

use App\Models\House;
use InfyOm\Generator\Common\BaseRepository;
use App\Models\HouseJoin;


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


    /**
     * [加入小屋家]
     * @param  [type] $user_id  [description]
     * @param  [type] $house_id [description]
     * @param  [type] $platform [description]
     * @param  [type] $price    [description]
     * @return [type]           [description]
     */
    public function joinHouse($user_id,$house_id,$platform,$price)
    {
        $house_join = HouseJoin::create([
            'house_id' => 'integer',
            'user_id' => 'integer',
            'price' => 'float',
            'pay_platform'=> $platform
        ]);
        $house_join->update([
            'number'=>time().'_'.$house_join->id
        ]);
        return $house_join;
    }

    /**
     * [搜索小屋]
     * @param  [type] $word [description]
     * @return [type]       [description]
     */
    public function queryHourses($word,$paginate=true)
    {
         $houses = House::where('status','已发布')
                ->where('name','like','%'.$word.'%')
                ->orWhere('content','like','%'.$word.'%')
                ->orWhere('address','like','%'.$word.'%')
                ->orWhere('gear','like','%'.$word.'%')
                ->orWhere('target','like','%'.$word.'%')
                ->orderBy('created_at','desc')
                ->with('join');
            $houses = $paginate ? $houses->paginate(15) : $houses->get();     
        return $houses;
    }

    /**
     * 我的小屋
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function myHourses($user_id)
    {
        $hourses = House::where('user_id',$user_id)
                ->with('join')
                ->orderBy('created_at','desc')
                ->paginate(15);
        $hourses = $this->dealHoursesPrice($hourses);
        return $hourses;
    }

    /**
     * 正在参与中的小屋
     * @param  integer $skip [description]
     * @param  integer $take [description]
     * @return [type]        [description]
     */
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

    /**
     * 即将结束的小屋
     * @param  integer $skip [description]
     * @param  integer $take [description]
     * @return boolean       [description]
     */
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

    /**
     * 即将上架的
     * @param  integer $skip [description]
     * @param  integer $take [description]
     * @return [type]        [description]
     */
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


    /**
     * 处理多个房子的价格
     * @param  [type] $hourses [description]
     * @return [type]          [description]
     */
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

    /**
     * 处理单个房子的进度
     * @param  [type] $hourse [description]
     * @return [type]         [description]
     */
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
        $progress = $price/$hourse->target > 1 ? 100 : round($price/$hourse->target*100);
        #总共支持金额
        $hourse['all_price'] =  $price;
        #累计支持人数
        $hourse['support_people'] =  $support_people;
        #进度
        $hourse['progress'] =  $progress;
        return $hourse;
    }

    /**
     * [getHouses description]
     * @param  [type]  $type [description]
     * @param  integer $skip [description]
     * @param  integer $take [description]
     * @return [type]        [description]
     */
    public function getHouses($type=null,$skip=0,$take=20)
    {
        return House::where('status','<>','审核中')
               ->orderBy('created_at','desc')
               ->skip($skip)
               ->take($take)
               ->get();
    }

    /**
     * 获取小屋详情
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
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
