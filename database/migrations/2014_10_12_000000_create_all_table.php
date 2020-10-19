<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('spots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->foreignId('spot_id');
            $table->foreignId('status_id');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_judge')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreignId('spot_id');
        });

        Schema::table('projects', function(Blueprint $table)
        {
            $table->foreign('spot_id')
                ->references('id')->on('spots')
                ->onDelete('restrict');
            $table->foreign('status_id')
                ->references('id')->on('statuses')
                ->onDelete('restrict');
        });

        Schema::table('users', function(Blueprint $table)
        {
            $table->foreign('spot_id')
                ->references('id')->on('spots')
                ->onDelete('restrict');
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
        Schema::dropIfExists('projects');
        Schema::dropIfExists('spots');
        Schema::dropIfExists('statuses');
    }
}
