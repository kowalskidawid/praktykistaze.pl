<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Models\Offer;
use App\Models\Category;
use App\Models\Location;
use App\Models\Type;

class OffersController extends Controller
{
    public const PER_PAGE = 12;

    // Display a listing of the resource.
    public function index(Request $request)
    {
        // List of values for select inputs in form
        $locations = Location::get();
        $categories = Category::get();
        $types = Type::get();
        // Requested values for filtering the results
        $location = $request->location;
        $category = $request->category;
        $position = $request->position;
        $city = $request->city;
        $type = $request->type;
        $salary = $request->salary;
        // Number of items per page, used in pagination

        // Requested offers
        $offers = Offer::when($location, function ($query, $location) {
            return $query->where('location_id', '=', $location);
        })
            ->when($category, function ($query, $category) {
                return $query->where('category_id', '=', $category);
            })
            ->when($type, function ($query, $type) {
                return $query->where('type_id', '=', $type);
            })
            ->when($city, function ($query, $city) {
                return $query->where('city', 'LIKE', '%' . $city . '%');
            })
            ->when($position, function ($query, $position) {
                return $query->where('position', 'LIKE', '%' . $position . '%');
            })
            ->when($salary, function ($query, $salary) {
                return $query->where('salary', '>', 0);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(self::PER_PAGE);

        return view('offers.index', compact('offers', 'locations', 'categories', 'types'));
    }

    // Display the specified resource.
    public function show(Offer $offer)
    {
        return view('offers.show', compact('offer'));
    }

    // Add new offer.
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'position' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'city' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'type_id' => 'required|exists:types,id',
            'offer_duration' => 'required|integer',
            'job_start' => 'date|nullable',
            'job_duration' => 'integer|nullable',
            'salary' => 'nullable|integer',
            'vacancies' => 'integer|nullable',
            'description' => 'required|string'
        ]);
        $data = $request->all();
        $data['image'] = '';
        // Store data
        $company = auth()->user()->company;
        $offer = $company->offers()->create($data);
        // After Offer created - store image if exists
        if ($request->image) {
            $image = $request->image;
            $img = Image::make($image);
            $img->fit(1024, 320)->encode('jpg');
            $imageName = md5(time());
            $imagePath = 'offers/' . $offer->id . '/' . $imageName . '.jpg';
            Storage::disk('public')->put($imagePath, $img->encoded, 'public');
            $offer->update(['image' => '/storage/' . $imagePath]);
        }

        return back();
    }

    // Update an offer.
    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'position' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'city' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'type_id' => 'required|exists:types,id',
            'offer_duration' => 'required|integer',
            'job_start' => 'date|nullable',
            'job_duration' => 'integer|nullable',
            'salary' => 'nullable|integer',
            'vacancies' => 'integer|nullable',
            'description' => 'required|string'
        ]);
        $company = auth()->user()->company;
        $offerToUpdate = $company->offers()->findOrFail($offer->id);
        if ($request->image) {
            $data = $request->all();
            $oldImage = $offer->image;
            $image = $request->image;
            $img = Image::make($image);
            $img->fit(1024, 320)->encode('jpg');
            $imageName = md5(time());
            $imagePath = 'offers/' . $offerToUpdate->id . '/' . $imageName . '.jpg';
            Storage::disk('public')->put($imagePath, $img->encoded, 'public');
            Storage::disk('public')->delete($oldImage);
            $data['image'] = '/storage/' . $imagePath;
            $offerToUpdate->update($data);
        } else {
            $data = $request->except('image');
            $offerToUpdate->update($data);
        }

        return back();
    }

    // Delete the offer
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->back()->withSuccess('Offer Deleted');
    }
    // // Upload image
    // public function image(Request $request, Offer $offer)
    // {
    //     $this->validate($request, [
    //         'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
    //     ]);
    //     // Retrieve images
    //     $oldImage = $offer->image;
    //     $newImage = $request->image;
    //     // Generate data
    //     $name = md5(time());
    //     $path = 'offers/' . $offer->id . '/' . $name . '.jpg';
    //     // Upload file and update Offer
    //     Storage::disk('public')->put($path, file_get_contents($newImage), 'public');
    //     $offer->image = $path;
    //     $offer->save();
    //     Storage::disk('public')->delete($oldImage);

    //     return redirect()->back()->withSuccess('Offer updated');
    // }

    public function search(Request $request)
    {
        $locations = Location::get();
        $categories = Category::get();
        $types = Type::get();
        $city = $request->city;
        $keyword = $request->keyword;
        $offers = Offer::when($city, function ($query, $city) {
            return $query->where('city', 'LIKE', '%' . $city . '%');
        })->when($keyword, function ($query, $keyword) {
            $keyword = '%' . $keyword . '%';
            $jobCategories = Category::where('name', 'LIKE', $keyword)->pluck('id')->toArray();
            $locations = Location::where('name', 'LIKE', $keyword)->pluck('id')->toArray();

            $query = $query->where('position', 'LIKE', $keyword)
                ->orWhere('description', 'LIKE', $keyword)
                ->orWhere('city', 'LIKE', $keyword);
            foreach ($jobCategories as $category) {
                $query->orWhere('category_id', $category);
            }
            foreach ($locations as $location) {
                $query->orWhere('location_id', $location);
            }
        })
            ->orderBy('created_at', 'desc')
            ->paginate(self::PER_PAGE);

        return view('offers.index', compact('offers', 'locations', 'categories', 'types'));
    }
}
