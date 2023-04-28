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
            $table->text('office_address')->nullable();
            $table->text('permit_no')->nullable();
            $table->date('permit_date')->nullable();
            $table->double('local_invest')->nullable();
            $table->double('foreign_invest')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('permit_type_id');
            $table->foreign('permit_type_id')->references('id')->on('permit_types');
            $table->unsignedBigInteger('form_of_invest_id');
            $table->foreign('form_of_invest_id')->references('id')->on('form_of_invests');
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
