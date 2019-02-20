<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone',
        'avatar_image_id', 'status', 'password', 'activation_key',
        'account_nonse', 'google_user_id',
        'facebook_user_id', 'is_guest', 'notes',
        'created_at', 'updated_at'
    ];

}
