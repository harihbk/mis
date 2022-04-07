<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Revertvalue;
/**
 * Class Rivertnut
 * @package App\Models
 * @version April 7, 2022, 6:40 am UTC
 *
 * @property string $name
 * @property string $minimun_order_quantity
 * @property string $brand
 * @property string $warranty
 * @property string $air_consumption
 * @property string $handle_type
 * @property string $air_pressure
 * @property string $air_inlet
 * @property string $rivet_diameter
 * @property string $part_number
 * @property string $stroke_length
 * @property string $delivert_time
 * @property string $packaging_details
 * @property string $key_details
 */
class Rivertnut extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'revert_nuts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'key_details',
        'icon',
        'images',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'key_details' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];



   public function getrevert()
   {
       return $this->hasMany(Revertvalue::class, 'revert_nuts_id', 'id');
   }

}
