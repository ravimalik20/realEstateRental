<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = "listing";

	protected $fillable = ["user_id", "campus_id", "address", "city", "province",
		"postal_code", "country_id", "lat", "lng", "distance", "date_available",
		"num_bedrooms", "num_bathrooms", "max_tenants", "num_parking",
		"license_number", "rent", "housing_type_id", "lease_required",
		"utilities_required", "initial_payment_type_id", "website", "description"
	];

	public function user()
	{
		return $this->belongsTo(\App\User::class, "user_id", "id");
	}

	public function campus()
	{
		return $this->belongsTo(Campus::class, "campus_id", "id");
	}

	public function country()
	{
		return $this->belongsTo(Country::class, "country_id", "id");
	}

	public function housingType()
	{
		return $this->belongsTo(HousingType::class, "housing_type_id", "id");
	}

	public function initialPaymentType()
	{
		return $this->belongsTo(InitialPaymentType::class, "initial_payment_type_id", "id");
	}

	public function amenities()
	{
		return $this->belongsToMany(Amenities::class, 'listing_amenities', 'listing_id', 'amenity_id');
	}

	public function restrictions()
	{
		return $this->belongsToMany(Restrictions::class, 'listing_restrictions', 'listing_id', 'restriction_id');
	}

	public function photos()
	{
		return $this->hasMany(ListingPhoto::class, 'listing_id', 'id');
	}

	public function thumbnail()
	{
		$image = $this->photos()->orderBy("created_at")->first();

		if (!$image)
			return '/assets/images/best-deal1.jpg';
		else
			return $image->path;
	}

	public static function make($request)
	{
		$data = $request->all();

		$data["user_id"] = \Auth::user()->id;
		$data["lat"] = 0.0;
		$data["lng"] = 0.0;

		$listing = Listing::create($data);

		if (!$listing)
			return null;

		$amenities_id = $request->amenity;
		if (count($amenities_id) > 0) foreach ($amenities_id as $id) {
			ListingAmenity::create([
				"listing_id" => $listing->id,
				"amenity_id" => $id
			]);
		}

		$restrictions_id = $request->restriction;
		if (count($restrictions_id) > 0) foreach ($restrictions_id as $id) {
			ListingRestriction::create([
				"listing_id" => $listing->id,
				"restriction_id" => $id
			]);
		}

		$images = json_decode($request->images);
		if (count($images) > 0) foreach ($images as $image) {
			ListingPhoto::create([
				"listing_id" => $listing->id,
				"path" => $image
			]);
		}

		return $listing;
	}
}
