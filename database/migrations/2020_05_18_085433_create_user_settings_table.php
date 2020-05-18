<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->default(0);
            $table->tinyInteger("romance")->default(0);
            $table->tinyInteger("networking")->default(0);
            $table->tinyInteger("friends")->default(0);
            $table->string("identify")->nullable();
            $table->string("conditions")->nullable();
            $table->integer("marital")->default(0);
            $table->integer("spiritual")->default(0);
            $table->integer("alcohol")->default(0);
            $table->integer("tabacco")->default(0);
            $table->integer("friendly420")->default(0);
            $table->integer("children")->default(0);
            $table->integer("animal")->default(0);
            $table->string("bio")->nullable();
            $table->string("ages")->default("[18, 99]");
            $table->integer("distance")->default(1);
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
        Schema::dropIfExists('user_settings');
    }
}
