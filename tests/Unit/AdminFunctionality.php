<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminFunctionality extends TestCase
{
    use RefreshDatabase;

    // ================= Registration =================

    /** @test */
    public function new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '01717747418', // include phone
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated(); // check user is logged in
        
        // Fix: redirect matches your app
        $response->assertRedirect('/home');

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
            'name' => 'John Doe',
            'phone' => '01717747418', // also check phone
        ]);
    }

    // ================= Login =================

    /** @test */
    public function login_screen_can_be_rendered()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function users_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'name'=> 'John',
            'email' => 'admin@example.com',
            'phone'=> '01717747418',
            'password' => bcrypt('password'),
            'usertype' => 'admin',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($user);
        
        // Fix: redirect matches the actual app
        $response->assertRedirect('/');
    }

    /** @test */
    public function users_cannot_login_with_invalid_password()
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'usertype' => 'admin',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'wrongpassword',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function logout_works()
    {
        $admin = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($admin);

        $response = $this->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }

    // ================= Rooms =================

    /** @test */
    public function admin_can_view_rooms()
    {
        $admin = User::factory()->create(['usertype' => 'admin']);
        Room::create([
            'room_title' => 'Standard Room',
            'description' => 'Nice room',
            'price' => 100,
            'wifi' => true,
            'room_type' => 'Standard'
        ]);

        $response = $this->actingAs($admin)->get('/view_room');

        $response->assertStatus(200);
        $response->assertSeeText('Standard Room');
    }

    /** @test */
    public function admin_can_add_room()
    {
        $admin = User::factory()->create(['usertype' => 'admin']);

        $roomData = [
            'title' => 'Deluxe Room',
            'description' => 'Luxury room',
            'price' => 200,
            'wifi' => true,
            'type' => 'Deluxe'
        ];

        $response = $this->actingAs($admin)->post('/add_room', $roomData);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('rooms', [
            'room_title' => 'Deluxe Room',
            'price' => 200,
        ]);
    }

    /** @test */
    public function non_admin_cannot_add_room()
    {
        $user = User::factory()->create(['usertype' => 'user']);

        $response = $this->actingAs($user)->post('/add_room', [
            'title' => 'VIP Room',
        ]);

        $response->assertStatus(403);
    }

    // ================= Bookings =================

    /** @test */
    public function admin_can_approve_booking()
    {
        $admin = User::factory()->create(['usertype' => 'admin']);
        $booking = Booking::factory()->create(['status' => 'Pending']);

        $response = $this->actingAs($admin)->get("/approve_book/{$booking->id}");

        $response->assertRedirect();
        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'Approved'
        ]);
    }

    /** @test */
    public function admin_can_reject_booking()
    {
        $admin = User::factory()->create(['usertype' => 'admin']);
        $booking = Booking::factory()->create(['status' => 'Pending']);

        $response = $this->actingAs($admin)->get("/reject_book/{$booking->id}");

        $response->assertRedirect();
        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'Rejected'
        ]);
    }

    /** @test */
    public function non_admin_cannot_approve_or_reject_booking()
    {
        $user = User::factory()->create(['usertype' => 'user']);
        $booking = Booking::factory()->create(['status' => 'Pending']);

        $response1 = $this->actingAs($user)->get("/approve_book/{$booking->id}");
        $response2 = $this->actingAs($user)->get("/reject_book/{$booking->id}");

        $response1->assertStatus(403);
        $response2->assertStatus(403);
    }

    // ================= Gallery =================

    /** @test */
    public function admin_can_upload_gallery_image()
    {
        $admin = User::factory()->create(['usertype' => 'admin']);

        $file = \Illuminate\Http\UploadedFile::fake()->image('test.jpg');

        $response = $this->actingAs($admin)->post('/upload_gallery', [
            'image' => $file,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseCount('galleries', 1);
    }

    /** @test */
    public function admin_can_delete_gallery_image()
    {
        $admin = User::factory()->create(['usertype' => 'admin']);
        $gallery = Gallery::factory()->create();

        $response = $this->actingAs($admin)->get("/delete_gallery/{$gallery->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('galleries', ['id' => $gallery->id]);
    }
}