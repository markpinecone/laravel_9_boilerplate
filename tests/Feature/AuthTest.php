<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_and_login()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(201)->assertJsonStructure(['token', 'user']);

        $login = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $login->assertStatus(200)->assertJsonStructure(['token', 'user']);
    }

    public function test_role_middleware_allows_admin_only()
    {
        $user = User::factory()->create(['role' => 'user']);
        $admin = User::factory()->create(['role' => 'admin']);

        Sanctum::actingAs($admin);
        $this->getJson('/api/admin')->assertStatus(200);

        Sanctum::actingAs($user);
        $this->getJson('/api/admin')->assertStatus(403);
    }
}

