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
        Schema::create('member_of_families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('head_of_family_id')->nullable();
            $table->foreign('head_of_family_id')->references('id')->on('head_of_families');
            $table->string('NIK')->unique();
            $table->string('address')->nullable();
            $table->string('full_name')->nullable();
            $table->string('last_education')->nullable();
            $table->string('type_of_work')->nullable();
            $table->string('etnic')->nullable();
            $table->string('citizenship')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('relationship_status_in_the_family')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_of_families');
    }
};
