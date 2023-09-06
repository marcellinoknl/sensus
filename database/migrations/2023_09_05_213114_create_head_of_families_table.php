<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('head_of_families', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('census_id')->unsigned();
            $table->foreign('census_id')->references('id')->on('censuses');
            $table->integer('number_of_family_card')->unique();
            $table->string('NIK')->unique();
            $table->string('address');
            $table->string('full_name');
            $table->string('last_education');
            $table->string('type_of_work');
            $table->string('etnic');
            $table->string('citizenship');
            $table->integer('age');
            $table->string('gender');
            $table->string('religion');
            $table->string('relationship_status_in_the_family');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('phone_number');
            $table->string('marital_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('head_of_families');
    }
};
