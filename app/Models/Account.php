<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AccountType;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['account_name', 'description', 'account_type_id', 'user_id', 'is_active', 'company_id'];

    public function type()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
