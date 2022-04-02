<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Categorys;
/**
 * Class Subcategory
 * @package App\Models
 * @version May 1, 2021, 1:07 pm UTC
 *
 * @property \App\Models\Category $category
 * @property string $name
 * @property integer $category_id
 */
class Subcategory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'subcategory';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'category_id',
        'icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'category_id' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Categorys::class, 'category_id');
    }

    public function parentcategory()
    {
        return $this->hasMany(\App\Models\Parentcategory::class, 'subcategory_id');
    }
}
