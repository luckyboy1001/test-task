<?php

namespace Features\Payment\Repos\Eloquent;

use Features\Core\Repos\Base\BaseRepository;
use Features\Payment\Models\Transaction;
use Features\Payment\Repos\Interfaces\TransactionRepoInterface;

class TransactionRepo extends BaseRepository implements TransactionRepoInterface
{

    public function findUsers(int $id, int $user_id)
    {
        return Transaction::where('user_id', $user_id)->whereId($id)->firstOrFail();
    }

    public function store($data)
    {
        try {
            $transaction = Transaction::create($data);
        } catch (\Exception $exception) {
            return null;
        }

        if (!$transaction->exists) {
            return null;
        }

        return $transaction;
    }

    public function model(): string
    {
        return Transaction::class;
    }
}
