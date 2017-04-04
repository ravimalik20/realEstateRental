<?php

namespace App\Http\Controllers;

use App\Models\Bathroom;
use App\Models\Bedroom;
use App\Models\Campus;
use App\Models\HousingType;
use App\Models\PriceRange;
use App\Models\Listing;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
	{
		$bathrooms = Bathroom::all();
		$bedrooms = Bedroom::all();
		$campuses = Campus::all();
		$housing_types = HousingType::all();
		$price_ranges = PriceRange::all();

		$listings = Listing::orderBy("created_at", "DESC")->paginate(4);

		return view('index', compact('bathrooms', 'bedrooms', 'campuses',
			'housing_types', 'price_ranges', 'listings'));
	}
}
