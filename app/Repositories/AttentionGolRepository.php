<?php

namespace App\Repositories;

use App\Models\AttentionGol;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AttentionGolRepository
 * @package App\Repositories
 * @version October 30, 2018, 1:47 pm CST
 *
 * @method AttentionGol findWithoutFail($id, $columns = ['*'])
 * @method AttentionGol find($id, $columns = ['*'])
 * @method AttentionGol first($columns = ['*'])
*/
class AttentionGolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'gol_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AttentionGol::class;
    }
}
