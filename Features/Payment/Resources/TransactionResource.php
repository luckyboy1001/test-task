<?php

namespace Features\Payment\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'status' => $this->status,
            'result' => $this->result,
            'created_at' => $this->created_at->format('Y-m-d H:i:s')
        ];
    }

}
