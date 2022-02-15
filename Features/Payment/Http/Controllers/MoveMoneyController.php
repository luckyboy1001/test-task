<?php

namespace Features\Payment\Http\Controllers;

use App\Http\Controllers\Controller;

use Features\Payment\Http\Requests\MoveMoneyRequest;
use Features\Payment\Repos\Interfaces\TransactionRepoInterface;
use Features\Payment\Repos\TransactionRepo;
use Features\Payment\Responses\Response;
use Features\Payment\Services\HttpServices\MoveMoneyService;

class MoveMoneyController extends Controller
{
    private TransactionRepoInterface $transactionRepo;

    public function __construct(TransactionRepoInterface $transactionRepo)
    {
        $this->transactionRepo = $transactionRepo;
    }

    public function move(MoveMoneyRequest $request)
    {
        $response = MoveMoneyService::move();

        $transaction = $this->transactionRepo->store([
            'result' => $response->result,
            'track_id' => $response->track_id,
            'status' => $response->status,
            'user_id' => auth()->id()
        ]);


        if ($response->status == 'FAILED') {
            return Response::transactionFailed($response->error, $response->track_id, status: $response->status);
        }

        if ($response->status == 'DONE') {
            return Response::transactionSucceed($response->result, $response->track_id, status: $response->status);
        }
    }

}
