<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListingContactMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("listing_contacts", function ($table) {
			$table->increments("id");
			
			$table->integer("listing_id")->unsigned();
			$table->foreign("listing_id")->references("id")->on("listing");

			$table->integer("listing_user_id")->unsigned();
			$table->foreign("listing_user_id")->references("id")->on("users");

			$table->string("name");
			$table->string("phone");
			$table->string("message");

			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("listing_contacts");
    }
}
