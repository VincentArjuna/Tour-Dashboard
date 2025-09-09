<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingCustomer extends Model
{
    /** @use HasFactory<\Database\Factories\BookingCustomerFactory> */
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'customer_id',
        'is_primary',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
