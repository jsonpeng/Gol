<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HouseJoin
 * @package App\Models
 * @version October 15, 2018, 5:31 pm CST
 *
 * @property integer house_id
 * @property integer user_id
 * @property float price
 * @property string number
 * @property string pay_status
 */
class HouseJoin extends Model
{
    use SoftDeletes;

    public $table = 'house_joins';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'house_id',
        'user_id',
        'price',
        'number',
        'pay_status',
        'pay_platform'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'house_id' => 'integer',
        'user_id' => 'integer',
        'price' => 'float',
        'number' => 'string',
        'pay_status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
