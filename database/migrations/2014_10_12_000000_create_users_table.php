<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("firstname");
            $table->string("lastname");
            $table->string("phone", 20)->unique();
            $table->string('username', 50)->unique();
            $table->string('email', 50)->unique();
            $table->date("birthday");
            $table->integer("identify_id")->default(0);
            $table->integer("cuisine_id")->default(0);
            $table->integer("astrological_id")->default(0);
            $table->integer("industry_id")->default(0);
            $table->string("headshot")->nullable();
            $table->string("photos")->nullable();
            $table->integer("category_id")->default(0);
            $table->integer("option_id")->default(0);
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
