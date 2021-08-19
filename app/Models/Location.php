<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Company;
use App\Models\Offer;

class Location extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
