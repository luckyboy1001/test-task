<?php

namespace Features\Payment\Tests\Features;

use Features\Auth\Models\User;
use Features\Payment\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TransactionGetDataTest extends TestCase
{
    use RefreshDatabase;

    public function testTransactionShowValidResponse(): void
    {
        $this->actingAs($user = User::factory()->create());

        $transaction = Transaction::factory()->createOne([
            'user_id' => $user->id
        ]);

        $response = $this->getJson(route('payment.user.transactions.show', $transaction->id));

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) => $json
                ->has('data')
                ->hasAll(['data.id', 'data.result', 'data.status', 'data.track_id'])
                ->etc()
            );
    }


    public function testTransactionIndexValidResponse(): void
    {
        $this->actingAs($user = User::factory()->create());

        $transaction = Transaction::factory()->count(10)->create([
            'user_id' => $user->id
        ]);

        $response = $this->getJson(route('payment.user.transactions.index'));

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) => $json
                ->has('data')
                ->whereType('data', 'array')
                ->etc()
            );
    }



}
