<?php

namespace App\Repositories;

use App\Models\HouseJoin;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HouseJoinRepository
 * @package App\Repositories
 * @version October 15, 2018, 5:31 pm CST
 *
 * @method HouseJoin findWithoutFail($id, $columns = ['*'])
 * @method HouseJoin find($id, $columns = ['*'])
 * @method HouseJoin first($columns = ['*'])
*/
class HouseJoinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'house_id',
        'user_id',
        'price',
        'number',
        'pay_status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HouseJoin::class;
    }
}
