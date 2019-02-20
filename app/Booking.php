<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    use Notifiable;

    protected $fillable = [
        'start_date', 'start_time',
        'end_time', 'buffer_before', 'buffer_after', 'status',
        'customer_id', 'service_id', 'agent_id', 'ip_address',
        'created_at', 'updated_at'
    ];

}
