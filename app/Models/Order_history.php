<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_status;
class Order_history extends Model
{
    use HasFactory;
    protected $table = 'order_history';
    protected $fillable = ['order_history_id', 'order_id', 'order_status_id','description'];

    /**
     * Get the getStatus that owns the Order_history
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getStatus()
    {
        return $this->belongsTo(Order_status::class, 'order_status_id', 'order_status_id');
    }
}
