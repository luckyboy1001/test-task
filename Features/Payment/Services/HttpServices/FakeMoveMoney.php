<?php

namespace Features\Payment\Services\HttpServices;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Str;

class FakeMoveMoney
{

    public function move()
    {
        return $this->getFakeResponse();
    }

    private function getFakeResponse()
    {
        $result = [
            "amount" => 1,
            "description" => "شرح تراکنش",
            "destinationFirstname" => "خلیلی  حسینی  بیابانی",
            "destinationLastname" => "سمیه   غز اله  فریماه",
            "destinationNumber" => "0201000900000",
            "inquiryDate" => "951217",
            "inquirySequence" => 1001,
            "inquiryTime" => "095554",
            "message" => " ",
            "paymentNumber" => "12",
            "refCode" => "9611240622211448",
            "sourceFirstname" => "مهدی  ز اده",
            "sourceLastname" => "امیر",
            "sourceNumber" => "0200900000000",
            "type" => "internal",
            "reasonDescription" => "19 "
        ];

        return (object)[
            'result' => $result,
            "status" => "DONE",
            "track_id" => "transfer-to-deposit-0323"
        ];
    }

}
