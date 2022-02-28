<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnofield extends Model
{
    use HasFactory;

    //public $table = 'product_part_number';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
       '_label',
       '_value',
       '_status',
       'product_part_number_id'
    ];


    public static $rules = [
        '_label' => ['nullable','array'],
        '_value' => ['nullable','array'],

    ];
}
