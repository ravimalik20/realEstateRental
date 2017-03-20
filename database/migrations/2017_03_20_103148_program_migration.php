<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProgramMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create("programs", function ($table) {
			$table->increments("id");
			$table->string("name");
			$table->timestamps();
		});

		Schema::table("listing", function ($table) {
			$table->integer("program_id")->unsigned()->nullable()->default(null);
			$table->foreign("program_id")->references("id")->on("programs");
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
