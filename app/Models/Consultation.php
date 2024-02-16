<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
  protected $casts = [
    'chat_history' => 'array'
  ];
  
  protected $fillable = ['user_id ', 'chat_history', 'start_time', 'end_time'];
}
