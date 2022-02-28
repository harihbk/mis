<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    public $table = 'whishlists';

    public $fillable = [
        'user_id',
        'whishlist_id',
        'whishlist_type',
        'collection_name',
        'wishlist_id'
    ];

    public function whishlist()
    {
        return $this->morphTo();
    }
}
