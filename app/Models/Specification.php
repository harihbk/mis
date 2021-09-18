<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Specification
 * @package App\Models
 * @version May 2, 2021, 4:00 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $specificationTypes
 * @property string $name
 * @property string $description
 */
class Specification extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'specification';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function specificationTypes()
    {
        
        return $this->hasMany(\App\Models\Specification_type::class, 'specification_id');
    }

    public function Product_part_number()
    {
        return $this->belongsToMany(\App\Models\Product_part_number::class);
    }

   
}
