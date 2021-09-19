<?php

namespace App\Models;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product_part_number;
//use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;
    protected $table = 'order_product';
    protected $fillable = ['product_id', 'order_id', 'quantity'];


   /**
    * Get the user that owns the Order_product
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function partno()
   {
       return $this->belongsTO(Product_part_number::class, 'product_id', 'id');
   }



}
