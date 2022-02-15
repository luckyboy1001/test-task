<?php

namespace Features\Payment\Services\HttpServices;

use Illuminate\Support\Facades\Http;

class MoveMoney
{

    public function move()
    {
        $data = [
            "amount" => 100,
            "description" => "شرح تراکنش",
            "destinationFirstname" => "محمحد",
            "destinationLastname" => "محمدی",
            "destinationNumber" => "IR611828005214917501",
            "paymentNumber" => "123456",
            "sourceFirstName" => "علی",
            "sourceLastName" => "محمدی",
            "reasonDescription" => "تست"
        ];

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

        if ($response->failed()) {
            return $data;
        }

        dd($response);
    }

}
