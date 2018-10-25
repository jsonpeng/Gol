<?php

namespace App\Repositories;

use App\Models\Gol;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GolRepository
 * @package App\Repositories
 * @version October 25, 2018, 5:38 pm CST
 *
 * @method Gol findWithoutFail($id, $columns = ['*'])
 * @method Gol find($id, $columns = ['*'])
 * @method Gol first($columns = ['*'])
*/
class GolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image',
        'brief',
        'content',
        'xukezheng',
        'zuqi',
        'area',
        'address',
        'hourse_status',
        'gaizao_status',
        'publish_status',
        'price',
        'give_word'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Gol::class;
    }
}
