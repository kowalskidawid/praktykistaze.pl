<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Application extends Model
{
    use HasFactory;

    // Create a connection to Student model
    public function students()
    {
        return $this->belongsToMany(Student::class, 'favourites');
    }
}
