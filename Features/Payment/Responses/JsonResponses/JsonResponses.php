<?php

namespace Features\Payment\Responses\JsonResponses;

class JsonResponses
{
    public function transactionSucceed($result, $track_id, $message = 'transaction done', $status = '')
    {
        return response()->json([
            'message' => $message,
            'track_id' => $track_id,
            'result' => $result,
            'status' => $status
        ]);
    }

    public function transactionFailed(array $errors, $track_id, $message = 'transaction failed', $status = '')
    {
        return response()->json([
            'message' => $message,
            'track_id' => $track_id,
            'errors' => $errors,
            'status' => $status
        ], 400);
    }

}
