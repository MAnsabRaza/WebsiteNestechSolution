<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('saleStatus')->nullable();
            $table->string('postAd_society')->nullable();
            $table->string('voucher_type');
            $table->date('current_date');
            $table->string('postAd_manage_by')->default('user');
            $table->string('postAd_for');
            $table->boolean('status');
            $table->string('postAd_owner_name');
            $table->string('postAd_contact_number');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('postAd_type');
            $table->string('postAd_residential_type')->nullable();
            $table->string('postAd_commercial_type')->nullable();
            $table->string('postAd_storey')->nullable();
            $table->string('postAd_direction');
            $table->string('postAd_building_structure');
            $table->string('postAd_city');
            $table->string('postAd_price')->nullable();
            $table->string('postAd_address');
            $table->string('advance_payment')->nullable();
            $table->longText('postAd_description');
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
        Schema::dropIfExists('post');
    }
}