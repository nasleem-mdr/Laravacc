<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Burden extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'name', 'description', 'value', 'is_active'];
}
