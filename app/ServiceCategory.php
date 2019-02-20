<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ServiceCategory extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'short_description', 'parent_id',
        'section_image_id', 'order_number',
        'created_at', 'updated_at'
    ];

}
