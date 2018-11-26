<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserZichangLog
 * @package App\Models
 * @version November 24, 2018, 7:37 pm CST
 *
 * @property integer user_id
 * @property float change
 * @property string status
 * @property string number
 * @property string type
 */
class UserZichangLog extends Model
{
    use SoftDeletes;

    public $table = 'user_zichang_logs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'change',
        'status',
        'number',
        'type',
        'detail',
        'name',
        'pay_type',
        'account'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'change' => 'float',
        'status' => 'string',
        'number' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
    public function user(){
        return $this->belongsTo('App\User');
    }

}
