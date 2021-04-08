<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name'
    ];

    // Create a connection to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
