<?php

namespace Features\Auth\Tests\Features;

use Features\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginUserTest extends TestCase
{
    use RefreshDatabase;

    public function testApiTokenIssuesCorrectly()
    {
        $this->withoutExceptionHandling();
        $user_data = $this->createUser();

        $response = $this->postJson(route('auth.login'), [
            'email' => $user_data['email'],
            'password' => '12345678'
        ]);

        $response->assertOk();
        $response->assertJson([
            'user' => true,
            'token' => true
        ]);

        $this->assertDatabaseCount('personal_access_tokens', 1);
        $this->assertDatabaseHas('personal_access_tokens', [
            'name' => 'auth-token',
        ]);
    }

    public function testLoginRouteValidatintion()
    {
        $user_data = $this->createUser();

        $response = $this->postJson(route('auth.login'), [
            'email' => '',
            'password' => ''
        ]);

        $response->assertStatus(422);

        $this->assertDatabaseCount('personal_access_tokens', 0);

    }

    public function testLoginRouteWrongData()
    {
        $user_data = $this->createUser();

        $response = $this->postJson(route('auth.login'), [
            'email' => $user_data['email'],
            'password' => 'testeeet'
        ]);

        $response->assertStatus(422);

        $this->assertDatabaseCount('personal_access_tokens', 0);

    }


    private function createUser(): array
    {
        $user_data = [
            'email' => 'test@test.com',
            'password' => bcrypt('12345678')
        ];
        $user = User::factory()->create($user_data);
        return $user_data;
    }
}
