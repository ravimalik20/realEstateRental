<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Post;

class BlogTest extends DuskTestCase
{
	/**
     * A Dusk test example.
     *
     * @return void
     */
    public function testBlog()
    {
		$this->browse(function ($browser) {
			$browser->loginAs(\App\User::find(1))
				->visit('/posts/create')
				->type('title', 'Test Blog Post')
				->keys('#post_ifr', ['{shift}', 'Test'], 'Content')
				->attach('file', public_path('/assets/images/blog-4.jpg'))
				->click('.btn.btn-primary.btn-block.btn-lg')
				->pause(2000)
				->waitFor(".container")
				->assertPathIs("/blog");

            $browser->visit('/blog')
		        ->assertSee('Quick Links')
				->visit('/blog/1')
				->assertSee('LEAVE A COMMENT')
				->type('name', 'User 1')
				->type('email', 'test@test.com')
				->type('comment', 'Test Message.')
				->click('.btn-blue.uppercase.border_radius')
				->pause(2000)
				->waitFor(".container")
				->assertSee('Test Message.')
				->pause(2000);
        });
    }
}
