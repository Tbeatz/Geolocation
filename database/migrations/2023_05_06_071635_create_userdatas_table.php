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
        Schema::create('userdatas', function (Blueprint $table) {
            $table->id();
            $table->text('company_name')->nullable();
            $table->text('permit_no')->nullable();
            $table->unsignedBigInteger('form_of_invest_id')->nullable();
            $table->foreign('form_of_invest_id')->references('id')->on('form_of_invests');
            $table->text('businesstype_detail')->nullable();
            $table->text('business_location')->nullable();
            $table->double('total_invest_amount')->nullable();
            $table->text('product_type')->nullable();
            $table->text('raw_type')->nullable();
            $table->double('increase_invest')->nullable();
            $table->double('decrease_invest')->nullable();
            $table->text('yric_meeting')->nullable();
            $table->integer('labour_local')->nullable();
            $table->integer('labour-foreign')->nullable();
            $table->integer('labour_increase_local')->nullable();
            $table->integer('labour_increase_foreign')->nullable();
            $table->integer('investment_period')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->text('remark')->nullable();
            $table->text('contact_information')->nullable();
            $table->text('company_reg_no')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->text('bank_info')->nullable();
            $table->text('land_area')->nullable();
            $table->text('increase_land_area')->nullable();
            $table->text('decrease_land_area')->nullable();
            $table->text('permit_return')->nullable();
            $table->json('geolocation')->nullable();
            $table->date('business_startdate')->nullable();
            $table->text('construction_period')->nullable();
            $table->text('investor_name')->nullable();
            $table->text('org_permitdecision_return')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->boolean('type')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdatas');
    }
};
