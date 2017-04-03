<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class ListingTest extends DuskTestCase
{
	/**
     * A basic browser test example.
     *
     * @return void
     */
    public function testListing()
    {
		$user = User::find(1);

        $this->browse(function ($browser) use($user) {
			$browser->loginAs($user)
				->visit('listing')
				->assertSee('PROPERTY LISTINGS')
				->pause(500)
				->visit('/listing/create')
				->select('campus_id')
				->select('program_id')
				->type('location', '2045 Old Mill Rd, Kitchener, Ontario, Cana')
				->pause(2000)
				->keys("input[name=location]", ['{arrow_down}'])
				->keys("input[name=location]", ['{enter}'])
				->pause(1000)
				->clickLink('Next')
				->pause(1000)
				->select("housing_type_id")
				->keys("input[name=date_available]", "04/04/2017")
				->type("num_bedrooms", 3)
				->type("num_bathrooms", 3)
				->type("max_tenants", 3)
				->type("num_parking", 1)
				->type("license_number", str_random(10))
				->type("rent", "432.54")
				->select("initial_payment_type_id")
				->clickLink('Next')
				->pause(1000)
				->keys("input[name='amenity[]']", ['{enter}'])
				->keys("input[name='restriction[]']", ['{enter}'])
				->clickLink('Next')
				->pause(1000)
				->clickLink('Next')
				->pause(1000)
				->type('description', 'Lorem Ipsum.')
				->type('website', 'http://www.google.com/')
				->clickLink('Finish')
				->pause(2000)
				->waitFor(".container")
				->assertPathIs("/home")
				;

			$listing = \App\Models\Listing::get()[0];

			$browser->loginAs($user)
				->visit('/listing/'.$listing->id.'/edit')
				->select('campus_id')
				->select('program_id')
				->type('location', '2075 Old Mill Rd, Kitchener, Ontario, Cana')
				->pause(2000)
				->keys("input[name=location]", ['{arrow_down}'])
				->keys("input[name=location]", ['{enter}'])
				->pause(1000)
				->clickLink('Next')
				->pause(1000)
				->select("housing_type_id")
				->keys("input[name=date_available]", "04/04/2017")
				->type("num_bedrooms", 3)
				->type("num_bathrooms", 3)
				->type("max_tenants", 3)
				->type("num_parking", 1)
				->type("license_number", str_random(10))
				->type("rent", "432.54")
				->select("initial_payment_type_id")
				->clickLink('Next')
				->pause(1000)
				->keys("input[name='amenity[]']", ['{enter}'])
				->keys("input[name='restriction[]']", ['{enter}'])
				->clickLink('Next')
				->pause(1000)
				->clickLink('Next')
				->pause(1000)
				->type('description', 'Lorem Ipsum. Description Edited.')
				->type('website', 'http://www.google.com/')
				->clickLink('Finish')
				->pause(2000)
				->waitFor(".container")
				->assertPathIs("/home")
				;

			$browser->loginAs($user)
				->visit('/listing/'.$listing->id)
				->assertSee('QUICK SUMMARY')
				->type('name', 'Test Name')
				->type('phone', '7879879878')
				->type('message', str_random(10))
				->click('.btn-blue.uppercase.border_radius')
				->pause(2000)
				->waitFor('.container')
				->assertSee('Test Name');
        });
    }
}
