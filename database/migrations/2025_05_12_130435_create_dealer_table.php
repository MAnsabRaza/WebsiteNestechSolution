<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer', function (Blueprint $table) {
            $table->id();
            $table->date('current_date');
            $table->string('voucher_type')->default('new');
            $table->string('dealer_name');
            $table->string('dealer_email')->unique()->nullable();
            $table->string('dealer_phone')->unique();
            $table->string('dealer_city');
            $table->boolean('dealer_status')->default(0);
            $table->string('dealer_country');
            $table->string('dealer_area');
            $table->string('dealer_office_address');
            $table->longText('dealer_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.a
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealer');
    }
}