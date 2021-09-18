<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partno_filters extends Model
{
    use HasFactory;

    public $table = 'partno_filters';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'product_part_number_id',
        'specification_type_id',
        'specification_id',

    ];



}
