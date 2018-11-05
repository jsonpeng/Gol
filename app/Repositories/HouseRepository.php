<?php

namespace App\Repositories;

use App\Models\House;
use InfyOm\Generator\Common\BaseRepository;
use App\Models\HouseJoin;
use App\Models\AttentionHouse;
use Carbon\Carbon;

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
     * [首页展示小屋]
     * @return [type] [description]
     */
    public function indexShowHouses($take=12)
    {
        return House::where('index_show','>',0)
                ->where('status','<>','审核中')
                ->where('status','<>','已下架')
                ->orderBy('index_show','desc')
                ->take($take)
                ->get();
    }

    public  function allHouses(){

        $houses =  House::where('status','<>','审核中')
                ->with('join')
                ->get();
        $houses = $this->dealHoursesPrice($houses); 
        return $houses;
    }

    /**
     * 关注人数
     * @param  [type] $house_id [description]
     * @return [type]           [description]
     */
    public function attentionPeopleNum($house_id)
    {
        return AttentionHouse::where('house_id',$house_id)->count();
    }



    /**
     * [加入小屋家]
     * @param  [type] $user_id  [description]
     * @param  [type] $house_id [description]
     * @param  [type] $platform [description]
     * @param  [type] $price    [description]
     * @return [type]           [description]
     */
    public function joinHouse($user_id,$input)
    {
        $input['user_id'] = $user_id;
        $house_join = HouseJoin::create($input);
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
         $houses = House::where('status','<>','审核中')
                ->where('status','<>','已下架')
                ->where('name','like','%'.$word.'%')
                ->orWhere('content','like','%'.$word.'%')
                ->orWhere('address','like','%'.$word.'%')
                ->orWhere('gear','like','%'.$word.'%')
                ->orWhere('target','like','%'.$word.'%')
                ->orderBy('created_at','desc')
                ->with('join');
        $houses = $paginate ? $houses->paginate(15) : $houses->get();  
        $houses = $this->dealHoursesPrice($houses);   
        return $houses;
    }

    /**
     * 我的小屋
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function myHourses($user_id,$paginate=true)
    {
        $hourses = House::where('user_id',$user_id)
                ->with('join')
                ->orderBy('created_at','desc');

        $hourses = $paginate ? $hourses->paginate(15) : $hourses->get();  

        $hourses = $this->dealHoursesPrice($hourses);
        return $hourses;
    }


   /**
    * [小屋总共支持人数]
    * @param  [type] $hourses [description]
    * @return [type]          [description]
    */
   public function hourseAllPeoples($hourses)
   {
        $num = 0;
        if(count($hourses))
        {
            foreach ($hourses as $key => $val) {
                $num += $val->support_people;
            }
        }
        return $num;

   }

    /**
     * 正在参与中的小屋
     * @param  integer $skip [description]
     * @param  integer $take [description]
     * @return [type]        [description]
     */
    public function nowJoinHouses($paginate=0,$take=4)
    {
        $hourses = House::where('status','已发布')
               ->with('join')
               ->orderBy('created_at','desc');

        if($paginate){
             $hourses = $hourses->paginate(12);
        }
        else{
           $hourses = $hourses->take($take)
                    ->get();
        }
               
        $hourses = $this->dealHoursesPrice($hourses);

        return $hourses;
    }

    /**
     * 即将结束的小屋
     * @param  integer $skip [description]
     * @param  integer $take [description]
     * @return boolean       [description]
     */
    public function isEndHouses($paginate=0,$request=null,$take=4)
    {

        $hourses = House::where('status','已发布')
               ->with('join')
               ->orderBy('created_at','asc');

        if($paginate){
             $hourses = $hourses->get();
        }
        else{
           $hourses = $hourses->take($take)
                    ->get();
        }
     
        $now = Carbon::now();

        $day = (int)getSettingValueByKey('house_end_time');

        $hourses = $hourses->filter(function($item) use($now,$day) {
            return $now->diffInDays($item->endtime) <= $day;
        });

        foreach ($hourses as $key => $val) {
            $val['s_time'] = time_parse($val->endtime)->diffForHumans($now);
        }

        $hourses = $this->dealHoursesPrice($hourses);

        if(!empty($paginate) && !empty($request)){
            $hourses = operatPaginate($hourses,$request,12);
        }

        return $hourses;
    }

    /**
     * 即将上架的
     * @param  integer $skip [description]
     * @param  integer $take [description]
     * @return [type]        [description]
     */
    public function forSaleHouses($paginate=0,$take=4)
    {
        $hourses = House::where('status','已完成')
               ->whereNotNull('put_time')
               ->with('join')
               ->orderBy('created_at','asc');

        if($paginate){
             $hourses = $hourses->paginate(12);
        }
        else{
           $hourses = $hourses->take($take)
                    ->get();
        }
 
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
                #支付成功的才算记录
                if($val->pay_status == '已支付'){
                    ++$support_people;
                    $price += $val->price;
                }
            }
        }

        #进度
        $progress = $price/$hourse->target > 1 ? 100 : round($price/($hourse->target*10000)*100);
        #总共支持金额
        $hourse['all_price'] =  $price;
        #累计支持人数
        $hourse['support_people'] =  $support_people;
        #进度
        $hourse['progress'] =  $progress;
        #所有档位
        $hourse['all_gears'] = spaceList($hourse->gear);
        #最低档位
        $hourse['min_gears'] = isset($hourse['all_gears'][0]) ? $hourse['all_gears'][0] : 0;
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

        if($hourse->status != '已发布' && $hourse->status != '已完成'){
            return '该小屋'.$hourse->status;
        }

        $hourse = $this->dealJoins($hourse);
        return (object)['hourse'=>$hourse];
    }




}
