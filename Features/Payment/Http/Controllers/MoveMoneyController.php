<?php

namespace Features\Payment\Http\Controllers;

use App\Http\Controllers\Controller;

use Features\Payment\Http\Requests\MoveMoneyRequest;
use Features\Payment\Repos\TransactionRepo;
use Features\Payment\Responses\Response;
use Features\Payment\Services\HttpServices\MoveMoneyService;

class MoveMoneyController extends Controller
{

    public function move(MoveMoneyRequest $request)
    {
        $response = MoveMoneyService::move();

        $transaction = TransactionRepo::store([
            'result' => $response->result,
            'track_id' => $response->track_id,
            'status' => $response->status,
            'user_id' => auth()->id()
        ]);


        if ($response->status == 'FAILED') {
            return Response::transactionFailed($response->error, $response->track_id);
        }

        if ($response->status == 'DONE') {
            return Response::transactionSucceed($response->result, $response->track_id);
        }
    }

}
