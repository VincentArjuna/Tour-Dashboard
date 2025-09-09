<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'guide_id',
        'start_date',
        'end_date',
        'number_of_people',
        'total_price',
        'status',
        'payment_status',
        'special_requests',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'booking_customers')->withTimestamps();
    }

    public function itineraries()
    {
        return $this->hasMany(BookingItinerary::class);
    }
}
