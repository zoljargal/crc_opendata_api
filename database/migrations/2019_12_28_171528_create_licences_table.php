<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('regnum', 1000);
            $table->string('cusname', 500);
            $table->string('servname', 1000);
            $table->string('property', 1000);
            $table->string('province', 1000);
            $table->string('town', 1000);
            $table->string('address', 1000);
            $table->string('phone', 1000);
            $table->string('email', 1000);
            $table->string('status', 500);
            $table->date('begindate');
            $table->date('enddate');
            $table->string('servtname', 1000);
            $table->string('typename', 1000);
            $table->text('usage_location', 2000);

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
        Schema::dropIfExists('licences');
    }
}
