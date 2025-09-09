<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\BookingCustomer;
use App\Models\BookingItinerary;
use App\Models\Customer;
use App\Models\Guide;
use Tests\TestCase;

class FactoryTest extends TestCase
{
    public function test_customer_factory_creates_valid_data(): void
    {
        $customer = Customer::factory()->make();

        $this->assertNotEmpty($customer->full_name);
        $this->assertNotEmpty($customer->phone_number);
        $this->assertContains($customer->identity_type, ['passport', 'id_card', 'driver_license']);
    }

    public function test_guide_factory_creates_valid_data(): void
    {
        $guide = Guide::factory()->make();

        $this->assertNotEmpty($guide->name);
        $this->assertNotEmpty($guide->bio);
        $this->assertIsArray($guide->languages);
        $this->assertContains($guide->identity_type, ['passport', 'id_card', 'driver_license']);
    }

    public function test_booking_factory_creates_valid_data(): void
    {
        $booking = Booking::factory()->make();

        $this->assertGreaterThan(0, $booking->number_of_people);
        $this->assertGreaterThan(0, $booking->total_price);
        $this->assertContains($booking->status, ['pending', 'confirmed', 'cancelled', 'completed']);
        $this->assertContains($booking->payment_status, ['unpaid', 'paid', 'refunded', 'partial']);
        $this->assertInstanceOf(\DateTime::class, $booking->start_date);
        $this->assertInstanceOf(\DateTime::class, $booking->end_date);
    }

    public function test_booking_customer_factory_creates_valid_data(): void
    {
        $bookingCustomer = BookingCustomer::factory()->make();

        $this->assertIsBool($bookingCustomer->is_primary);
    }

    public function test_booking_itinerary_factory_creates_valid_data(): void
    {
        $itinerary = BookingItinerary::factory()->make();

        $this->assertNotEmpty($itinerary->title);
        $this->assertGreaterThan(0, $itinerary->day_number);
        $this->assertContains($itinerary->time_of_day, ['morning', 'afternoon', 'evening', 'full_day']);
        $this->assertNotEmpty($itinerary->description);
        $this->assertNotEmpty($itinerary->location);
    }
}
