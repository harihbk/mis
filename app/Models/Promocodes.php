<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocodes extends Model
{
    use HasFactory;
    public $table = 'promocodes';
    protected $fillable = ['id','code','reward','quantity','data','is_disposable','expires_at'];

}
