<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Specification_type
 * @package App\Models
 * @version May 2, 2021, 4:00 am UTC
 *
 * @property \App\Models\Specification $specification
 * @property string $spec_type
 * @property string $description
 * @property string $image
 * @property integer $specification_id
 */
class Specification_type extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'specification_type';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'spec_type',
        'description',
        'image',
        'specification_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'spec_type' => 'string',
        'description' => 'string',
       // 'image' => 'string',
        'specification_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'spec_type' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        //'image' => 'required|string|max:255',
        'specification_id' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function specification()
    {
        return $this->belongsTo(\App\Models\Specification::class, 'specification_id');
    }
}
