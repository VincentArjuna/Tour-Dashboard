<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'date_of_birth',
        'identity_type',
        'identity_number',
        'special_needs',
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_customers')->withTimestamps();
    }
}
