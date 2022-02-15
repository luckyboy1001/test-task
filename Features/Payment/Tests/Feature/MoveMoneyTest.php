<?php

namespace Features\Payment\Tests\Features;

use Features\Auth\Models\User;
use Features\Payment\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MoveMoneyTest extends TestCase
{
    use RefreshDatabase;

    public function testMoveMoneyWithCorrectInformation(): void
    {
        $this->actingAs($user = User::factory()->create());

        $data = [
            'amount' => 1200,
            'description' => 'testing',
            'destinationFirstname' => 'mohammad',
            'destinationLastname' => 'mohammadi',
            'destinationNumber' => '12345678912345678912345678'
        ];

        $response = $this->postJson(route('payment.moveMoney'), $data);

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->whereType('result', 'array')
                ->where('status', Transaction::STATUS_DONE)
                ->etc()
            );

        $data = $response->json();


        $data = [
            'track_id' => $data['track_id'],
            'status' => $data['status'],
            'user_id' => $user->id,
        ];

        $this->assertDatabaseHas('transactions', $data);
        $this->assertDatabaseCount('transactions', 1);
    }


    public function testMoveMoneyValidationErrorsRequired(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->postJson(route('payment.moveMoney'));

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'amount',
                'description',
                'destinationFirstname',
                'destinationLastname',
                'destinationNumber',
            ]);

        $this->assertDatabaseCount('transactions', 0);

    }

}
