<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string("vcat_id");
            $table->string("company_name");
            $table->string("contact_no");
            $table->string("email");
            $table->string("mobile_no");
            $table->string("city");
            $table->string("country");
            $table->string("website");
            $table->string("gst_no");
            $table->string("pan_no");
            $table->string("address");
            $table->string("status");
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
        Schema::dropIfExists('vendors');
    }
}
