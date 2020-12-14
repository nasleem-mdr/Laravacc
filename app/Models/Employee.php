<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'departement_id', 'user_id', 'status_id', 'burden_id', 'name', 'date_of_birth', 'place_of_birth', 'address', 'city_id', 'region_id', 'contry_id', 'phone', 'is_active'];
}
