<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agent extends Model
{
    use Notifiable;

    protected $fillable = [
        'avatar_image_id', 'bio_image_id',
        'first_name', 'last_name', 'title', 'bio',
        'features', 'email', 'phone', 'password',
        'custom_hours', 'wp_user_id',
        'created_at', 'updated_at'
    ];

}
