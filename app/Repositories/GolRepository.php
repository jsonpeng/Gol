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

    /**
     * [获取不同类型的gols]
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    public function getTypeGols($type,$skip=0,$take=20){
        return Gol::where('type',$type)
            ->where('publish_status',1)
            ->orderBy('created_at','desc')
            ->skip($skip)
            ->take($take)
            ->get();
    }

    /**
     * [获取小屋详情]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getGolDetail($id)
    {
        $gol = Gol::find($id);

        if(empty($gol)){
            return '没有找到该小屋';
        }

        if($gol->publish_status != '1'){
            return '该小屋已下架或者审核中';
        }

        return (object)['detail'=>$gol];
    }







}
