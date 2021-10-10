<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oc_address extends Model
{
    use HasFactory;

    protected $table = 'oc_address';
    protected $fillable = ['address_id ', 'customer_id', 'billing_email','billing_name','billing_address','billing_city','billing_province','billing_postalcode','billing_phone','created_at','updated_at'];

}
