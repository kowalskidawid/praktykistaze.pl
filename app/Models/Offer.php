<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use DateInterval;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\Category;
use App\Models\Location;
use App\Models\Favourite;
use App\Models\Application;
use App\Models\Type;

class Offer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "category_id",
        "location_id",
        "type_id",
        "position",
        "city",
        "location",
        "category",
        "type",
        "job_duration",
        "job_start",
        "salary",
        "vacancies",
        "description",
        "offer_duration",
        "image",
    ];

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

    // Create a connection to Location model
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // Create a connection to Location model
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Create a connection to Favourite model
    public function favourites()
    {
        return $this->belongsToMany(Student::class, 'favourites', 'offer_id', 'student_id')->withTimestamps();
    }

    // Create a connection to Application model
    public function applications()
    {
        return $this->belongsToMany(Student::class, 'applications', 'offer_id', 'student_id')->withTimestamps();
    }

    // 
    public function isActive()
    {
        $currentDate = Carbon::now();
        $startDate = $this->created_at;
        $offerDuration = $this->offer_duration;
        $endDate = $startDate->add($offerDuration, 'day');;
        $isActive = $endDate->gt($currentDate);
        return $isActive;
    }

    // 
    public function daysLeft()
    {
        $currentDate = new DateTime(date('Y-m-d H:i:s'));
        $startDate = $this->created_at;
        $offerDuration = $this->offer_duration;
        $endDate = new DateTime($startDate->add(new DateInterval('P'.strval($offerDuration).'D'))->format('Y-m-d'));
        $daysLeft = $currentDate->diff($endDate);
        return $daysLeft->format('%a');
    }

    // 
    public function isFavourite(User $user)
    {
        return $this->favourites()->where("user_id", $user->id)->exists();
    }

    // 
    public function isApplied(User $user)
    {
        return $this->applications()->where("user_id", $user->id)->exists();
    }
    
}
