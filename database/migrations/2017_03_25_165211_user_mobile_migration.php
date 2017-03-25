<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserMobileMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users", function ($table) {
			$table->string("mobile");
			$table->string("profile_pic_path")->nullable()->default(null);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function ($table) {
			$table->dropColumn("mobile");
			$table->dropColumn("profile_pic_path");
		});
    }
}
