<?php

namespace Feature\Auth\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    public function testUserRegistersSuccessfully()
    {
        $user_data = User::factory()->makeOne()->toArray();
        $user_data['password'] = bcrypt('12345678');

        $user_data = Arr::only($user_data, ['name', 'email', 'password']);


        $response = $this->postJson(route('auth.register'), $user_data);

        $response->assertStatus(201);
        $response->assertJson([
            'message' => true,
        ]);

        $this->assertDatabaseCount('users', 1);
    }

    public function testUserRegisterationValidationRules()
    {
        $response = $this->postJson(route('auth.register'), []);

        $response->assertJsonValidationErrors(['name', 'email', 'password']);
    }


}
