<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Student;
use App\Models\Company;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Create a connection to Role model
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Create a connection to Student model
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    // Create a connection to Company model
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    // Check role of the User
    public function roleCheck($role)
    {
        if ($this->role->name == $role) {
            return true;
        }
        else {
            return false;
        }
    }
}
