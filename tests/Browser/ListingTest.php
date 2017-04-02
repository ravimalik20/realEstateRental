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
		\DB::beginTransaction();

		$user = User::find(1);

        $this->browse(function ($browser) {
			$browser->visit('listing')
				->assertSee('PROPERTY LISTINGS');
        });

		\DB::rollBack();
    }
}
