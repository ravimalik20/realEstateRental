<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
            	->assertSee('Register')
				->type('first_name', str_random(10))
				->type('last_name', str_random(10))
				->type('email', str_random(6)."@".str_random(4).".com")
				->type('mobile', "9876543210")
				->type('password', "secret")
				->type('password_confirmation', "secret")
				->click('button[type=submit]')
				->assertPathIs('/home');
        });
    }
}
