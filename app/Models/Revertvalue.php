<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revertvalue extends Model
{
    use HasFactory;
    protected $table = 'revertvalues';

    public $timestamps = false;

    protected $softDelete = false;

    public $fillable = [
        'title',
        'title_values',
        'revert_nuts_id'


    ];
}
