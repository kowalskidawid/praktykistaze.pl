<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Favourite;
use App\Models\Application;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    // Create a connection to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Create a connection to Favourite model
    public function favourites()
    {
        return $this->belongsToMany(Favourite::class, 'favourites');
    }

    // Create a connection to Application model
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'applications');
    }
}
