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
        Schema::create('appointed_labours', function (Blueprint $table) {
            $table->id();
            $table->string('local_labour_male')->nullable();
            $table->string('local_labour_female')->nullable();
            $table->string('foreign_director_male')->nullable();
            $table->string('foreign_director_female')->nullable();
            $table->string('foreign_technician_male')->nullable();
            $table->string('foreign_technician_female')->nullable();
            $table->string('foreign_dependent_male')->nullable();
            $table->string('foreign_dependent_female')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointed_labours');
    }
};
