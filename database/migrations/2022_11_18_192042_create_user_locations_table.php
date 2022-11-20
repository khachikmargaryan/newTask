<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_locations',
            function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->unsignedBigInteger('user_id');
                $table->string('ip');
                $table->uuid('coord_x');
                $table->uuid('coord_y');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();
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
        Schema::dropIfExists('user_locations');
    }
}
