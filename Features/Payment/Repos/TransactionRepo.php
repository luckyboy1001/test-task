<?php

namespace Features\Payment\Repos;

use Features\Payment\Models\Transaction;

class TransactionRepo
{

    public static function all()
    {
        return Transaction::all();
    }

    public static function allWhere(array $conditions)
    {
        return Transaction::where($conditions)->get();
    }


    public static function store($data)
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

}
