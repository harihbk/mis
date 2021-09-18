<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Childcategory
 * @package App\Models
 * @version May 1, 2021, 2:13 pm UTC
 *
 * @property \App\Models\Parentcategory $parentcategory
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $name
 * @property integer $parentcategory_id
 */
class Childcategory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'childcategory';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'parentcategory_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'parentcategory_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'parentcategory_id' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parentcategory()
    {
        return $this->belongsTo(\App\Models\Parentcategory::class, 'parentcategory_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'childcategory_id');
    }
}
