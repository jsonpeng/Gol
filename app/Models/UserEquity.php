<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserEquity
 * @package App\Models
 * @version November 29, 2018, 2:04 pm CST
 *
 * @property integer user_id
 * @property string type
 * @property string time
 * @property string content
 */
class UserEquity extends Model
{
    use SoftDeletes;

    public $table = 'user_equities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'type',
        'time',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'type' => 'string',
        'time' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
