<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;
use App\Models\Student;
use App\Models\Companies;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    // Create a connection to Offer model
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    // Create a connection to Student model
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    // Create a connection to Company model
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function canDelete(): bool
    {
        $canDelete = false;
        if (
            $this->students->count() == 0
            && $this->offers->count() == 0
            && $this->companies->count() == 0
        ) {
            $canDelete = true;
        }
        return $canDelete;
    }
}
