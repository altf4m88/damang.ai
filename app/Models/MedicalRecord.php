<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
  protected $fillable = ['user_id ', 'medical_condition', 'allergies', 'weight', 'height', 'blood_type'];
}
