<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingContact extends Model
{
    protected $table = "listing_contacts";

	protected $fillable = ["listing_id", "listing_user_id", "name", "phone", "message"];

	public function listing()
	{
		return $this->belongsTo(Listing::class, "listing_id", "id");
	}

	public function listingUser()
	{
		return $this->belongsTo(\App\User::class, "listing_user_id", "id");
	}

	public static function store($listing, $request)
	{
		$data = $request->all();
		$data["listing_id"] = $listing->id;
		$data["listing_user_id"] = $listing->user_id;

		$contact = self::create($data);

		return $contact;
	}
}
