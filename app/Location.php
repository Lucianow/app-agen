<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Location extends Model
{
    use Notifiable;

   protected $fillable = [
        'name', 'full_address', 'status', 'selection_image_id', 'created_at', 'updated_at'
   ];
}
