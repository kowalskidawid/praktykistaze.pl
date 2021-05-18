<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Models\Favourite;
use App\Models\Application;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'category_id'
    ];

    // Create a connection to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Create a connection to Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Create a connection to Location model
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // Create a connection to Favourite model
    public function favourites()
    {
        return $this->belongsToMany(Offer::class, 'favourites', 'student_id', 'offer_id')->withTimestamps()->latest('pivot_created_at');;
    }

    // Create a connection to Application model
    public function applications()
    {
        return $this->belongsToMany(Offer::class, 'applications', 'student_id', 'offer_id')->withTimestamps()->latest('pivot_created_at');
    }
}
