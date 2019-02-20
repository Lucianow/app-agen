<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'short_description', 'is_price_variable',
        'price_min', 'price_max', 'charge_amount',
        'is_deposit_required', 'deposit_value', 'duration',
        'buffer_before', 'buffer_after', 'category_id', 'order_number',
        'selection_image_id', 'description_image_id', 'bg_color',
        'status', 'created_at', 'updated_at'
    ];

}
