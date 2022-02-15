<?php

namespace Features\Payment\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;

use Dflydev\DotAccessData\Data;
use Features\Auth\Models\User;
use Features\Payment\Models\Transaction;
use Features\Payment\Repos\Interfaces\TransactionRepoInterface;
use Features\Payment\Repos\TransactionRepo;
use Features\Payment\Resources\TransactionResource;
use Features\Payment\Responses\Response;
use Features\Payment\Services\HttpServices\MoveMoneyService;
use Illuminate\Support\Facades\Cache;

class GetUserTransactionController extends Controller
{

    private TransactionRepoInterface $transactionRepo;

    public function __construct(TransactionRepoInterface $transactionRepo)
    {
        $this->transactionRepo = $transactionRepo;
    }

    public function show($id)
    {
        $data = $this->transactionRepo->findUsers($id, auth()->id());

        return new TransactionResource($data);
    }

}
