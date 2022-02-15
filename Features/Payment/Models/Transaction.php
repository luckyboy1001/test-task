<?php

namespace Features\Payment\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'result',
        'status',
        'track_id',
        'user_id',
    ];

    protected $casts = [
        'result' => 'json'
    ];

    const STATUS_DONE = 'DONE';
    const STATUS_FAILED = 'FAILED';

}
