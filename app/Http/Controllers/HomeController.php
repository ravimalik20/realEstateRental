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

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
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

        return view('home', compact('bathrooms', 'bedrooms', 'campuses',
			'housing_types', 'price_ranges', 'amenities', 'restrictions',
			'programs'));
    }
}
