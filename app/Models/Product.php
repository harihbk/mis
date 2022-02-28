<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 * @package App\Models
 * @version May 1, 2021, 2:13 pm UTC
 *
 * @property \App\Models\Childcategory $childcategory
 * @property string $name
 * @property string $description
 * @property string $modified_by
 * @property string $image
 * @property integer $childcategory_id
 */
class Product extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'product';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
      //  'modified_by',
        'image',
        'childcategory_id',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        //'modified_by' => 'string',
       // 'image' => 'string',
        'childcategory_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
       // 'modified_by' => 'nullable|string|max:255',
       // 'image' => 'nullable|string|max:255',
        'childcategory_id' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function childcategory()
    {
        return $this->belongsTo(\App\Models\Childcategory::class, 'childcategory_id');
    }

    public function product_part_number()
    {
        return $this->hasMany(\App\Models\Product_part_number::class, 'product_id');
    }


}
