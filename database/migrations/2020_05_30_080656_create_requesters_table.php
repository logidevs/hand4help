<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requesters', function (Blueprint $table) {
            $table->id();
            $table->string('asker_name')->nullable();
            $table->string('asker_email')->nullable();
            $table->string('asker_phone')->nullable();
            $table->string('asker_relationship')->nullable();
            $table->string('asker_address')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
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
        Schema::dropIfExists('requesters');
    }
}
