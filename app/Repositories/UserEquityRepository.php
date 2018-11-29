<?php

namespace App\Repositories;

use App\Models\UserEquity;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserEquityRepository
 * @package App\Repositories
 * @version November 29, 2018, 2:04 pm CST
 *
 * @method UserEquity findWithoutFail($id, $columns = ['*'])
 * @method UserEquity find($id, $columns = ['*'])
 * @method UserEquity first($columns = ['*'])
*/
class UserEquityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'type',
        'time',
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserEquity::class;
    }
}
