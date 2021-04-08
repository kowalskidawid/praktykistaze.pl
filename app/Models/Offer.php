<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Offer extends Model
{
    use HasFactory;

    // Create a connection to Company model
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
