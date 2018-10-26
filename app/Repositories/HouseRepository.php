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


    public function getHouses($type=null,$skip=0,$take=20)
    {
        return House::where('status','<>','审核中')
               ->orderBy('created_at','desc')
               ->skip($skip)
               ->take($take)
               ->get();
    }




}
