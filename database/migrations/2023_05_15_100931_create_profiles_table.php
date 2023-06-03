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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('company_name')->nullable();
            $table->text('company_reg_no')->nullable();
            $table->date('company_reg_date')->nullable();
            $table->date('commercial_date')->nullable();
            $table->text('permit_no')->nullable();
            $table->date('permit_date')->nullable();
            $table->double('local_invest')->nullable();
            $table->double('foreign_invest')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('permit_type_id')->nullable();
            $table->foreign('permit_type_id')->references('id')->on('permit_types');
            $table->unsignedBigInteger('form_of_invest_id')->nullable();
            $table->foreign('form_of_invest_id')->references('id')->on('form_of_invests');
            $table->text('investor_name')->nullable();
            $table->text('investor_phone')->nullable();
            $table->text('investor_email')->nullable();
            $table->text('hr_name')->nullable();
            $table->text('hr_phone')->nullable();
            $table->text('businesstype_detail')->nullable();
            //geolocation
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('township_id')->nullable();
            $table->foreign('township_id')->references('id')->on('townships');
            $table->json('geolocation')->nullable();
            $table->string('cover')->nullable();
            $table->boolean('type')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
