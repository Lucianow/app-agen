<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Activity extends Model
{
    use Notifiable;

    protected $fillable = [
        'agent_id', 'booking_id', 'service_id',
        'customer_id', 'code',
        'description', 'initiated_by',
        'initiated_by_id', 'created_at', 'updated_at'
    ];

}
