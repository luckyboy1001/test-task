<?php

namespace Features\Payment\Database\Factories;

use Features\Auth\Models\User;
use Features\Payment\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{

    protected $model = Transaction::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => [Transaction::STATUS_DONE, Transaction::STATUS_FAILED][rand(0, 1)],
            'track_id' => $this->faker->uuid,
            'user_id' => User::factory()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
