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
            $table->text('land_area')->nullable();
            $table->text('land_plot_no')->nullable();
            $table->text('land_measure_no')->nullable();
            $table->text('street_no')->nullable();
            $table->text('street_name')->nullable();
            $table->unsignedBigInteger('landtype_id')->nullable();
            $table->foreign('landtype_id')->references('id')->on('landtypes');
            $table->unsignedBigInteger('businesszone_id')->nullable();
            $table->foreign('businesszone_id')->references('id')->on('businesszones');
            $table->boolean('land_lease_contract_stamp')->default(false);
            $table->boolean('land_lease_contract_register')->default(false);
            $table->string('cover')->nullable();
            $table->boolean('type')->default(false);
            //companydetail
            $table->boolean('environment_plan')->default(false);
            $table->date('environment_plan_date')->nullable();
            $table->boolean('industry_reg')->default(false);
            $table->text('industry_reg_no')->nullable();
            $table->date('industry_reg_date')->nullable();
            $table->boolean('construct_BBC')->default(false);
            $table->boolean('fire_insurance')->default(false);
            $table->text('fire_insurance_com')->nullable();
            $table->boolean('municipal_business_license')->default(false);
            $table->boolean('export_import_license')->default(false);
            $table->boolean('fire_recommendation')->default(false);
            $table->date('commercial_last_date')->nullable();
            $table->text('export_price')->nullable();
            $table->text('import_price')->nullable();
            $table->text('business_system_type')->nullable();
            $table->text('export_type')->nullable();
            $table->text('received_letter_brandname')->nullable();
            $table->text('commercial_company_name')->nullable();
            $table->unsignedBigInteger('commercial_country_id')->nullable();
            $table->foreign('commercial_country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->string('local_labour_male')->nullable();
            $table->string('local_labour_female')->nullable();
            $table->string('foreign_director_male')->nullable();
            $table->string('foreign_director_female')->nullable();
            $table->string('foreign_technician_male')->nullable();
            $table->string('foreign_technician_female')->nullable();
            $table->string('foreign_dependent_male')->nullable();
            $table->string('foreign_dependent_female')->nullable();
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
