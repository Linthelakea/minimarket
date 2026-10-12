<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }

    public function test_non_admin_cannot_access_admin(): void
    {
        $user = new \App\Models\User(['name' => 'Kasir', 'role' => 'kasir']);

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(403);
    }

    public function test_admin_can_access_admin(): void
    {
        $admin = new \App\Models\User(['name' => 'Admin', 'role' => 'admin']);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);

        $responseDashboard = $this->actingAs($admin)->get('/admin/dashboard');

        $responseDashboard->assertStatus(200);
    }

    public function test_kasir_can_access_kasir_dashboard(): void
    {
        $kasir = new \App\Models\User(['name' => 'Kasir', 'role' => 'kasir']);

        $response = $this->actingAs($kasir)->get('/kasir/dashboard');

        $response->assertStatus(200);
    }

    public function test_guest_is_redirected_from_kasir(): void
    {
        $response = $this->get('/kasir/dashboard');

        $response->assertRedirect('/login');
    }
}
