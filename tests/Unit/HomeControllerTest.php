<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function our_rooms_page_loads()
    {
        $response = $this->get('/our_rooms');
        $response->assertStatus(200);
        $response->assertViewIs('home.our_rooms');
    }

    /** @test */
    public function hotel_about_page_loads()
    {
        $response = $this->get('/hotel_about');
        $response->assertStatus(200);
        $response->assertViewIs('home.hotel_about');
    }

    /** @test */
    public function hotel_blog_page_loads()
    {
        $response = $this->get('/hotel_blog');
        $response->assertStatus(200);
        $response->assertViewIs('home.hotel_blog');
    }

    /** @test */
    public function hotel_contact_page_loads()
    {
        $response = $this->get('/hotel_contact');
        $response->assertStatus(200);
        $response->assertViewIs('home.hotel_contact');
    }

    /** @test */
    public function hotel_gallery_page_loads()
    {
        $response = $this->get('/hotel_gallary');
        $response->assertStatus(200);
        $response->assertViewIs('home.hotel_gallary');
    }

    /** @test */
    public function room_details_page_loads()
    {
        $room = Room::factory()->create();

        $response = $this->get('/room_details/'.$room->id);

        $response->assertStatus(200);
        $response->assertViewIs('home.room_details');
        $response->assertViewHas('room');
    }

    /** @test */
    public function contact_form_submits_successfully()
    {
        $response = $this->post('/contact', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '01234567890',
            'message' => 'Hello World'
        ]);

        $response->assertSessionHas('message');

        $this->assertDatabaseHas('contacts', [
            'email' => 'test@example.com'
        ]);
    }

    /** @test */
    public function booking_can_be_created_when_room_available()
    {
        $room = Room::factory()->create();

        $response = $this->post('/add_booking/'.$room->id, [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '01234567890',
            'arrivalDate' => now()->addDays(5)->format('Y-m-d'),
            'leavingDate' => now()->addDays(7)->format('Y-m-d'),
        ]);

        $response->assertSessionHas('message');

        $this->assertDatabaseHas('bookings', [
            'room_id' => $room->id,
            'email' => 'test@example.com'
        ]);
    }

    /** @test */
    public function booking_fails_if_room_already_booked()
    {
        $room = Room::factory()->create();

        Booking::create([
            'room_id' => $room->id,
            'name' => 'Existing',
            'email' => 'existing@test.com',
            'phone' => '01234567890',
            'arrival_date' => '2026-03-10',
            'leaving_date' => '2026-03-15',
        ]);

        $response = $this->post('/add_booking/'.$room->id, [
            'name' => 'New User',
            'email' => 'new@test.com',
            'phone' => '01234567890',
            'arrivalDate' => '2026-03-12',
            'leavingDate' => '2026-03-14',
        ]);

        $response->assertSessionHas('message');
    }
}