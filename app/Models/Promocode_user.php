<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promocodes;


class Promocode_user extends Model
{
    use HasFactory;
    public $table = 'promocode_user';
    protected $fillable = ['id','user_id','promocode_id','used_at'];

    public function getcoupondata(){
        return $this->belongsTo(Promocodes::class, 'promocode_id', 'id');
    }
}
