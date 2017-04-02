<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class IndexPageTest extends TestCase
{
	use DatabaseTransactions;

    public function testIndexPage()
    {
		$user = factory(User::class)->make();

		$response = $this->actingAs($user)
			->get('/');

        $response->assertStatus(200);
    }
}
