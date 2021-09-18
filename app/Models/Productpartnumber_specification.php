<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productpartnumber_specification extends Model
{
    use HasFactory;
    public $table = 'productpartnumber_specification';
    public $fillable = [
        'product_part_number_id',
        'specification_id'
    ];
}
