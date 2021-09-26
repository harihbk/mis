<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_status;
use App\Models\Promocode_user;


class Order extends Model
{



    use HasFactory;

    public $table = 'orders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    protected $fillable = ['id','user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city',
                            'billing_province', 'billing_postalcode', 'billing_phone', 'billing_name_on_card',
                            'billing_discount', 'billing_discount_code', 'billing_subtotal', 'billing_tax',
                            'billing_total', 'error','created_at','order_status_id','coupon_id'];



    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getStatus()
    {
        return $this->belongsTo(Order_status::class, 'order_status_id', 'order_status_id');
    }

    public function getCoupon(){
        return $this->belongsTo(Promocode_user::class, 'coupon_id', 'id');
    }

}
