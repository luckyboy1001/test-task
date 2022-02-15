<?php

namespace Features\Payment\Models;

use Features\Payment\Database\Factories\TransactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

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


    protected static function newFactory(): TransactionFactory
    {
        return TransactionFactory::new();
    }
}
