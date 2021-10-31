<?php

namespace App\Traits;

use Auth;
use DB;
use App\Models\Wishlist;

trait Wishlisttrait
{
    /**
     * Get all of the wishes for the model.
     */
    public function wishes()
    {

        return $this->morphToMany(Wishlist::class, 'whishlist');
    }

    /**
     * isWished.
     */
    public function isWished()
    {
        return DB::table('wishlist')
            ->where('user_id', Auth::id())
            ->where('model_type', get_class($this))
            ->where('model_id', $this->id)
            ->first();
    }
}
