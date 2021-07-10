<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;
use App\Models\User;
use App\Models\Offer;
use App\Models\Category;
use App\Models\Location;
use App\Models\Type;
use App\Models\Size;
use App\Models\Article;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    // Settings page
    public function settings()
    {
        return view('dashboard.settings');
    }
    public function email(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);
        $user = auth()->user();
        if (Hash::check($request->password, $user->password)) {
            $user->update(['email'=> $request->email]);
        }
        return back();
    }
    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'passwordNew' => 'required|string|min:8',
            'passwordConfirmed' => 'required|string|min:8',
        ]);
        $user = auth()->user();
        if (Hash::check($request->password, $user->password) && $request->passwordNew === $request->passwordConfirmed) {
            $user->update(['password'=> Hash::make($request->passwordNew)]);
        }
        return back();
    }
    // Profile page
    public function profile()
    {
        $locations = Location::get();
        $categories = Category::get();
        $sizes = Size::get();

        return view('dashboard.profile', compact('locations', 'categories', 'sizes'));
    }
    public function student(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'city' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'email' => 'nullable',
            'phone' => 'nullable',
            'linkedin' => 'nullable',
            'website' => 'nullable',
            'github' => 'nullable',
            'description' => 'nullable',
            'skills' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'cv' => 'nullable'
        ]);
        $user = auth()->user();
        $student = $user->student;
        if ($request->image) {
            $data = $request->all();
            $oldImage = $student->image;
            $image = $request->image;
            $img = Image::make($image);
            $img->fit(64, 64)->encode('jpg');
            $imageName = md5(time());
            $imagePath = 'students/' . $student->id . '/' . $imageName . '.jpg';
            Storage::disk('public')->put($imagePath, $img->encoded, 'public');
            Storage::disk('public')->delete($oldImage);
            $data['image'] = '/storage/'.$imagePath;
            $student->update($data);
        } elseif($request->cv){
            $data = $request->all();
            $oldCv = $student->cv;
            $cvPath = Storage::disk('private')->put('students/' . $student->id, $request->file('cv'));
            if ($oldCv) {
                Storage::disk('private')->delete($oldCv);
            }
            $data['cv'] = $cvPath;
            $student->update($data);
        } else {
            $data = $request->except('image');
            $student->update($data);
        }
        return back();
    }
    public function company(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_name' => 'required|string',
            'size_id' => 'required|exists:sizes,id',
            'category_id' => 'required|exists:categories,id',
            'city' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'email' => 'nullable',
            'phone' => 'nullable',
            'website' => 'nullable',
            'description' => 'nullable',
            'nip' => 'nullable',
        ]);
        $user = auth()->user();
        $company = $user->company;
        if ($request->image) {
            $data = $request->all();
            $oldImage = $company->image;
            $image = $request->image;
            $img = Image::make($image);
            $img->fit(64, 64)->encode('jpg');
            $imageName = md5(time());
            $imagePath = 'companies/' . $company->id . '/' . $imageName . '.jpg';
            Storage::disk('public')->put($imagePath, $img->encoded, 'public');
            Storage::disk('public')->delete($oldImage);
            $data['image'] = '/storage/'.$imagePath;
            $company->update($data);
        }else {
            $data = $request->except('image');
            $company->update($data);
        }
        return back();
    }
    // Favourites page
    public function favourites()
    {
        $student = auth()->user()->student;
        $favourites = $student->favourites;
        return view('dashboard.favourites', compact('favourites'));
    }
    // Applications page
    public function applications()
    {
        $student = auth()->user()->student;
        $applications = $student->applications;
        return view('dashboard.applications', compact('applications'));
    }
    // Offers page
    public function offers()
    {
        $company = auth()->user()->company;
        $offers = $company->offers->reverse();
        return view('dashboard.offers', compact('offers'));
    }
    public function offersCreate()
    {
        // List of values for select inputs in form
        $locations = Location::get();
        $categories = Category::get();
        $types = Type::get();

        return view('dashboard.offersCreate', compact('locations', 'categories', 'types'));
    }
    public function offersEdit(Offer $offer)
    {
        // List of values for select inputs in form
        $locations = Location::get();
        $categories = Category::get();
        $types = Type::get();

        return view('dashboard.offersEdit', compact('offer', 'locations', 'categories', 'types'));
    }
    // Applicants page
    public function applicants()
    {
        $company = auth()->user()->company;
        $offers = $company->offers->reverse();
        return view('dashboard.applicants', compact('offers'));
    }
    // Articles page
    public function articles()
    {
        $articles = Article::get()->reverse();
        return view('dashboard.articles', compact('articles'));
    }
    public function articlesEdit(Article $article)
    {
        return view('dashboard.articlesEdit', compact('article'));
    }
    public function articlesCreate()
    {
        return view('dashboard.articlesCreate');
    }
}
