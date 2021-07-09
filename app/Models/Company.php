<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Models\Offer;
use App\Models\Size;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'company_name',
        'size_id',
        'category_id',
        'city',
        'location_id',
        'email',
        'phone',
        'website',
        'description',
        'nip'
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
    
    // Create a connection to Size model
    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    // Create a connection to Location model
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // Create a connection to Offer model
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
