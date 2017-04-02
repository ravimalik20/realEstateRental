<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->loginAs(\App\User::find(1))
				->visit('/profile')
                ->assertSee('Profile')
				->clear('first_name')
				->type('first_name', 'TestEdited')
				->attach('profile_pic', public_path('/assets/images/owner1.jpg'))
				->click(".btn.btn-primary")
				->pause(2000)
				->waitFor(".container")
				->assertSee('TestEdited');
        });
    }
}
