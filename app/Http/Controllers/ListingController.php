<?php

namespace App\Http\Controllers;

use App\Models\Bathroom;
use App\Models\Bedroom;
use App\Models\Campus;
use App\Models\HousingType;
use App\Models\PriceRange;
use App\Models\Amenities;
use App\Models\Restrictions;

use Illuminate\Http\Request;

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

        return view('listing.index', compact('bathrooms', 'bedrooms', 'campuses',
			'housing_types', 'price_ranges', 'amenities', 'restrictions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('listing.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	public function search(Request $request)
	{
		return view('listing.partials.listing');
	}
}
