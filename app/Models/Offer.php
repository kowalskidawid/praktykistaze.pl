<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Category;

class Offer extends Model
{
    use HasFactory;

    // Create a connection to Company model
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Create a connection to Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
