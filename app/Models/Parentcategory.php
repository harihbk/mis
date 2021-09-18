<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Parentcategory
 * @package App\Models
 * @version May 1, 2021, 2:12 pm UTC
 *
 * @property \App\Models\Subcategory $subcategory
 * @property \Illuminate\Database\Eloquent\Collection $childcategories
 * @property string $name
 * @property integer $subcategory_id
 */
class Parentcategory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'parentcategory';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'subcategory_id',
        'icon',
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
        'subcategory_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'subcategory_id' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subcategory()
    {
        return $this->belongsTo(\App\Models\Subcategory::class, 'subcategory_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function childcategories()
    {
        return $this->hasMany(\App\Models\Childcategory::class, 'parentcategory_id');
    }
}
