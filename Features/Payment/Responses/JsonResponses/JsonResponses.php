<?php

namespace Features\Payment\Responses\JsonResponses;

class JsonResponses
{
    public function transactionSucceed($result, $track_id, $message = 'transaction done')
    {
        return response()->json([
            'message' => $message,
            'track_id' => $track_id,
            'result' => $result
        ]);
    }

    public function transactionFailed(array $errors, $track_id, $message = 'transaction failed')
    {
        return response()->json([
            'message' => $message,
            'track_id' => $track_id,
            'errors' => $errors
        ], 400);
    }

}
