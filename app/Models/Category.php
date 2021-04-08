<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;

class Category extends Model
{
    use HasFactory;

    // Create a connection to Offer model
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
