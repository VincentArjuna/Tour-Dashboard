<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingItinerary extends Model
{
    /** @use HasFactory<\Database\Factories\BookingItineraryFactory> */
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'title',
        'day_number',
        'time_of_day',
        'description',
        'location',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
