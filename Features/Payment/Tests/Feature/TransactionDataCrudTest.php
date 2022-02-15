<?php

namespace Features\Payment\Tests\Features;

use Features\Auth\Models\User;
use Features\Payment\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TransactionDataCrudTest extends TestCase
{
    use RefreshDatabase;

    public function testTransactionDataInsert(): void
    {
        $count = rand(1, 10);
        $this->actingAs($user = User::factory()->create());

        $transaction = Transaction::factory()->count($count)->create([
            'user_id' => $user->id
        ]);

        $this->assertDatabaseCount('transactions', $count);
    }



}
