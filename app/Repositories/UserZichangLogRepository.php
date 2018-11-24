<?php

namespace App\Repositories;

use App\Models\UserZichangLog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserZichangLogRepository
 * @package App\Repositories
 * @version November 24, 2018, 7:37 pm CST
 *
 * @method UserZichangLog findWithoutFail($id, $columns = ['*'])
 * @method UserZichangLog find($id, $columns = ['*'])
 * @method UserZichangLog first($columns = ['*'])
*/
class UserZichangLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'change',
        'status',
        'number',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserZichangLog::class;
    }
}
