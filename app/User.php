<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'mobile', 'profile_pic_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function listings()
	{
		return $this->hasMany(\App\Models\Listing::class, 'user_id', 'id')
			->orderBy('created_at', 'DESC');
	}

	public function getNameAttribute()
	{
		return $this->first_name . " " . $this->last_name;
	}

	public function getProfilePicAttribute()
	{
		$relative_path = $this->profile_pic_path;

		if (!$relative_path) {
			return "/assets/images/agent-media1.jpg";
		}

		$relative_path = str_replace('public', '', $relative_path);

		$path = url("/storage".$relative_path);

		return $path;
	}

	public static function updateObj($user, $request)
	{
		if ($request->hasFile('profile_pic')) {
			$path = $request->file('profile_pic')->store('public/uploads', 'local');
		}
		else {
			$path = null;
		}

		$data = $request->all();
		$data['profile_pic_path'] = $path;

		$user->update($data);

		return $user;
	}

	public static function validate($data)
	{
		return \Validator::make($data, [
            'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
            'mobile' => 'required|phone',
			'profile_pic' => 'image|mimes:jpg,jpeg,png'
        ]);
	}
}
