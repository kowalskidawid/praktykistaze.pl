<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Offer;

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

    // Create a connection to Offer model
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
