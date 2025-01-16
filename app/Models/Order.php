<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address',
        'contact_number',
        'mode_of_payment',
        'order_details',
        'total_amount',
        'status'
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
