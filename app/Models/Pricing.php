<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pricing
 * @package App\Models
 * @version October 25, 2021, 2:29 pm UTC
 *
 */
class Pricing extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pricings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name','description','slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
