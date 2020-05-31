<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequesterTypeOfSupport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requester_type_of_support', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requester_id')->constrained()->onDelete('cascade');
            $table->foreignId('type_of_support_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requester_type_of_support');
    }
}
