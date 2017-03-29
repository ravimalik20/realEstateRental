<?php

namespace App\Http\Controllers;

use App\Models\Bathroom;
use App\Models\Bedroom;
use App\Models\Campus;
use App\Models\HousingType;
use App\Models\PriceRange;
use App\Models\Amenities;
use App\Models\Restrictions;
use App\Models\InitialPaymentType;
use App\Models\Country;
use App\Models\Listing;
use App\Models\Program;
use App\Models\ListingAmenity;
use App\Models\ListingRestriction;
use App\Models\ListingPhoto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$bathrooms = Bathroom::all();
		$bedrooms = Bedroom::all();
		$campuses = Campus::all();
		$housing_types = HousingType::all();
		$price_ranges = PriceRange::all();
		$amenities = Amenities::all();
		$restrictions = Restrictions::all();
		$programs = Program::all();

        return view('listing.index', compact('bathrooms', 'bedrooms', 'campuses',
			'housing_types', 'price_ranges', 'amenities', 'restrictions',
			'programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$bathrooms = Bathroom::all();
		$bedrooms = Bedroom::all();
		$campuses = Campus::all();
		$housing_types = HousingType::all();
		$price_ranges = PriceRange::all();
		$amenities = Amenities::all();
		$restrictions = Restrictions::all();
		$initial_payment_type = InitialPaymentType::all();
		$countries = Country::all();
		$programs = Program::all();

        return view('listing.create', compact('bathrooms', 'bedrooms', 'campuses',
			'housing_types', 'price_ranges', 'amenities', 'restrictions',
			'initial_payment_type', 'countries', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listing = Listing::make($request);

		if (!$listing) {
			$request->flash();

			return redirect()->back();
		}

		return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$listing = Listing::findOrFail($id);

        return view('listing.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$listing = Listing::findOrFail($id);

        $bathrooms = Bathroom::all();
		$bedrooms = Bedroom::all();
		$campuses = Campus::all();
		$housing_types = HousingType::all();
		$price_ranges = PriceRange::all();
		$amenities = Amenities::all();
		$restrictions = Restrictions::all();
		$initial_payment_type = InitialPaymentType::all();
		$countries = Country::all();
		$programs = Program::all();

		$amenity_ids = $listing->amenities->map(function ($obj) {
			return $obj->id;
		})->toArray();

		$restriction_ids = $listing->restrictions->map(function ($obj) {
			return $obj->id;
		})->toArray();

        return view('listing.create', compact('bathrooms', 'bedrooms', 'campuses',
			'housing_types', 'price_ranges', 'amenities', 'restrictions',
			'initial_payment_type', 'countries', 'programs', 'listing',
			'amenity_ids', 'restriction_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listing = Listing::findOrFail($id);
		$listing = Listing::updateObj($listing, $request);

		return redirect('/listing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$listing = Listing::findOrFail($id);

		ListingAmenity::where("listing_id", $listing->id)->delete();
		ListingRestriction::where("listing_id", $listing->id)->delete();
		ListingPhoto::where("listing_id", $listing->id)->delete();

		$listing->delete();

		return back();
    }

	public function search(Request $request)
	{
		$user_id = $request->user_id ? $request->user_id: null;

		$listings = Listing::search($request, $user_id, 10);

		return view('listing.partials.listing', compact('listings'));
	}

	public function uploadImage(Request $request)
	{
		$path = $request->file('file')->store('public/uploads', 'local');

        return $path;
	}
}
