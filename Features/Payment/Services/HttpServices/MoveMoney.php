<?php

namespace Features\Payment\Services\HttpServices;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MoveMoney
{

    public function move($data = [])
    {
        $trackId = Str::uuid();

        $token = config('payment.api-token');
        $url = "clients/{clientId}/transferTo?trackId={$trackId}";
        $fullUrl = config('payment.api-prefix') . $url;

        $response =
            Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $token",
            ])
                ->post($fullUrl, $data);

        $data = $response->json();

        return (object)[
            'status' => $data['status'],
            "track_id" => $data['trackId'],
            'result' => $data['result'] ?? null,
            'error' => $data['error'] ?? null
        ];
    }

}
