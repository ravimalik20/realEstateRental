<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class LoginTest extends DuskTestCase
{
	/**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
		$user = User::where("email", "testuser@test.com")->first();

        $this->browse(function ($browser) use ($user) {
            $browser->visit('login')
                ->type('email', $user->email)
                ->type('password', "secret")
                ->press('Login')
				->assertPathIs('/home');
		});
    }
}
