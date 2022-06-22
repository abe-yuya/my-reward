<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testLoginSuccess(): void
    {
        $user = User::factory()->create(['email' => 'test@example.com']);

        $response = $this->postJson('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    /**
     * @return void
     */
    public function testLoginFailed(): void
    {
        User::factory()->create(['email' => 'test@example.com']);

        $response = $this->postJson('/login', [
            'email' => 'failed@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'ログインに失敗しました']);
    }

    /**
     * @return void
     */
    public function testLogoutSuccess(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/logout');

        $response->assertStatus(200);
        $response->assertJson(['message' => 'ログアウトしました']);
    }
}
