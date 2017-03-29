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
		"utilities_required", "initial_payment_type_id", "website", "description",
		"program_id"
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

	public function contacts()
	{
		return $this->hasMany(ListingContact::class, "listing_id", "id");
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
		$listing = self::saveUpdate($request);

		return $listing;
	}

	public static function updateObj($listing, $request)
	{
		return self::saveUpdate($request, $listing);
	}

	public static function saveUpdate($request, $listing=null)
	{
		$data = $request->all();

		$data["user_id"] = \Auth::user()->id;

		if ($listing) {
			$listing->update($data);
		}
		else {
			$listing = Listing::create($data);
		}

		if (!$listing)
			return null;

		if (count($listing->amenities) > 0) {
			ListingAmenity::where("listing_id", $listing->id)->delete();
		}

		$amenities_id = $request->amenity;
		if (count($amenities_id) > 0) foreach ($amenities_id as $id) {
			ListingAmenity::create([
				"listing_id" => $listing->id,
				"amenity_id" => $id
			]);
		}

		if (count($listing->restrictions) > 0) {
			ListingRestriction::where("listing_id", $listing->id)->delete();
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

	public static function search($request, $user_id=null, $paginate=null)
	{
		$listings = Listing::select("listing.*")
			->leftJoin('listing_amenities', 'listing_amenities.listing_id', '=',
				'listing.id')
			->leftJoin('listing_restrictions', 'listing_restrictions.listing_id',
				'=', 'listing.id');

		if ($user_id) {
			$listings = $listings->where("user_id", $user_id);
		}

		if ($request->has('campus') && $request->campus) {
			$listings = $listings->where('campus_id', $request->campus);
		}

		if ($request->has('program') && $request->program) {
			$listings = $listings->where('program_id', $request->program);
		}

		if ($request->has('housing_type') && $request->housing_type) {
			$listings = $listings->where('housing_type_id', $request->housing_type);
		}

		if ($request->has('price_range_min') && $request->price_range_min) {
			$listings = $listings->where('rent', '>=', $request->price_range_min);
		}

		if ($request->has('price_range_max') && $request->price_range_max) {
			$listings = $listings->where('rent', '<=', $request->price_range_max);
		}

		if ($request->has('bedroom') && $request->bedroom) {
			$comparing_method = (strpos($request->bedroom, '+') > 0) ? '>' : '=';

			$listings = $listings->where('num_bedrooms', $comparing_method, $request->bedroom);
		}

		if ($request->has('bathroom') && $request->bathroom) {
			$comparing_method = (strpos($request->bathroom, '+') > 0) ? '>' : '=';

			$listings = $listings->where('num_bathrooms', $comparing_method, $request->bathroom);
		}

		if ($request->has('distance_from') && $request->distance_from) {
			$listings = $listings->where('distance', '>=', $request->distance_from);
		}

		if ($request->has('distance_to') && $request->distance_to) {
			$listings = $listings->where('distance', '<=', $request->distance_to);
		}

		if ($request->has('amenity') && count($request->amenity) > 0) {
			$listings = $listings->whereIn('amenity_id', $request->amenity);
		}

		if ($request->has('restriction') && count($request->restriction) > 0) {
			$listings = $listings->whereIn('restriction_id', $request->restriction);
		}

		if ($paginate)
			$listings = $listings->distinct()->paginate($paginate);
		else
			$listings = $listings->distinct()->get();

		return $listings;
	}
}
