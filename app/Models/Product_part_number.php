<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Weight;
use App\Models\Unit;
use LamaLama\Wishlist\Wishlistable;
use App\Models\Partno_filters;

/**
 * Class Product_part_number
 * @package App\Models
 * @version May 1, 2021, 4:10 pm UTC
 *
 * @property \App\Models\Product $product
 * @property string $part_number
 * @property string $dates_to_ship
 * @property string $nominal_thread_m
 * @property string $nominal_thread_inch
 * @property string $product_length
 * @property string $pinch
 * @property string $detailed_ship
 * @property string $mounting_hole_shape
 * @property string $basic_shape
 * @property string $material
 * @property string $surface_treatment
 * @property string $tip_shape
 * @property string $additional_shape
 * @property string $sales_unit
 * @property string $application
 * @property string $strength_class_steel
 * @property string $strength_class_stainless_steel
 * @property string $screw_type
 * @property string $manufacturer
 * @property string $sale_discount
 * @property string $cad
 * @property string $modified_by
 * @property integer $product_id
 */




class Product_part_number extends Model
{
    use SoftDeletes;
    use HasFactory;

    use Wishlistable;


    public $table = 'product_part_number';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'part_number',
        'dates_to_ship',
        'nominal_thread_m',
        'nominal_thread_inch',
        'product_length',
        'pinch',
        'detailed_ship',
        'mounting_hole_shape',
        'basic_shape',
        'material',
        'surface_treatment',
        'tip_shape',
        'additional_shape',
        'sales_unit',
        'application',
        'strength_class_steel',
        'strength_class_stainless_steel',
        'screw_type',
        'manufacturer',
        'sale_discount',
        'cad',
        'modified_by',
        'product_id',
        'specification_id',
        'icon',
        'quantity',
        'original_price',
        'dash_price',
        'weight_id',
        'minimum',
        'maximum',
        'step',
        'product_weight',
          'unit_id',
          'deal_of_the_day',
          'display_status',
          'writenotes',
          'meta_title',
          'meta_description',
          'meta_key'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'part_number' => 'string',
        'dates_to_ship' => 'string',
        'nominal_thread_m' => 'string',
        'nominal_thread_inch' => 'string',
        'product_length' => 'string',
        'pinch' => 'string',
        'detailed_ship' => 'string',
        'mounting_hole_shape' => 'string',
        'basic_shape' => 'string',
        'material' => 'string',
        'surface_treatment' => 'string',
        'tip_shape' => 'string',
        'additional_shape' => 'string',
        'sales_unit' => 'string',
        'application' => 'string',
        'strength_class_steel' => 'string',
        'strength_class_stainless_steel' => 'string',
        'screw_type' => 'string',
        'manufacturer' => 'string',
        'sale_discount' => 'string',
        'cad' => 'string',
       // 'modified_by' => 'string',
        'product_id' => 'integer',
        'specification_id'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'part_number' => 'nullable|string|max:255',
        'dates_to_ship' => 'nullable|string|max:255',
        'nominal_thread_m' => 'nullable|string|max:255',
        'nominal_thread_inch' => 'nullable|string|max:255',
        'product_length' => 'nullable|string|max:255',
        'pinch' => 'nullable|string|max:255',
        'detailed_ship' => 'nullable|string|max:255',
        'mounting_hole_shape' => 'nullable|string|max:255',
        'basic_shape' => 'nullable|string|max:255',
        'material' => 'nullable|string|max:255',
        'surface_treatment' => 'nullable|string|max:255',
        'tip_shape' => 'nullable|string|max:255',
        'additional_shape' => 'nullable|string|max:255',
        'sales_unit' => 'nullable|string|max:255',
        'application' => 'nullable|string|max:255',
        'strength_class_steel' => 'nullable|string|max:255',
        'strength_class_stainless_steel' => 'nullable|string|max:255',
        'screw_type' => 'nullable|string|max:255',
        'manufacturer' => 'nullable|string|max:255',
        'sale_discount' => 'nullable|string|max:255',
        'cad' => 'nullable|string|max:255',
        'specification_id' =>'required',
        'display_status' => 'nullable',
       // 'modified_by' => 'nullable|string|max:255',
        'product_id' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    public function specification()
    {
        return $this->belongsToMany(\App\Models\Specification::class,'productpartnumber_specification','product_part_number_id','specification_id');

    }

    public function partno_filters($partno_id , $spec_id)
    {

        return Partno_filters::where([['product_part_number_id',$partno_id],['specification_id',$spec_id]])->get();
        //return $this->belongsToMany(\App\Models\Partno_filters::class,'productpartnumber_specification','','product_part_number_id','','product_part_number_id')->dd();

    }


   /**
    * Get the weight that owns the Product_part_number
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function weight()
   {
       return $this->belongsTo(Weight::class, 'weight_id', 'id');
   }


  public function unit()
   {

       return $this->belongsTo(Unit::class, 'unit_id', 'id');
   }




   /**
    * Get all of the comments for the Product_part_number
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function filterspec_type()
   {
    return $this->hasMany(\App\Models\Partno_filters::class,'product_part_number_id','id');
}

/**
 * Get all of the comments for the Product_part_number
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function comments123()
{
    return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
}
}
