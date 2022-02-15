<?php

namespace Features\Payment\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;

use Dflydev\DotAccessData\Data;
use Features\Auth\Models\User;
use Features\Payment\Models\Transaction;
use Features\Payment\Repos\TransactionRepo;
use Features\Payment\Resources\TransactionResource;
use Features\Payment\Responses\Response;
use Features\Payment\Services\HttpServices\MoveMoneyService;

class GetUserTransactionsController extends Controller
{

    public function index()
    {
        $data = TransactionRepo::allWhere([
            ['user_id', auth()->id()]
        ]);

        return TransactionResource::collection($data);
    }

}
