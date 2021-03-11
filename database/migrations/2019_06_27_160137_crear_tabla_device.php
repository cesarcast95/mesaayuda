<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDevice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 50);
            $table->string('name', 100);
            $table->string('ip', 100);
            $table->string('mac', 100);
            $table->string('serie', 100);
            $table->string('licencia', 100)->nullable();
            $table->longText('observaciones')->nullable();
            $table->unsignedBigInteger('categoryHW_id');
            $table->foreign('categoryHW_id', 'fk_device_category_hardware')->references('id')->on('category_hardware')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('dependence_id');
            $table->foreign('dependence_id', 'fk_device_dependence')->references('id')->on('dependence')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('os_id');
            $table->foreign('os_id', 'fk_device_os')->references('id')->on('os')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('state_device_id');
            $table->foreign('state_device_id', 'fk_device_state_device')->references('id')->on('state_device')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('personal_id');
            $table->foreign('personal_id', 'fk_device_personal_data')->references('id')->on('personal_data')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id', 'fk_device_brand')->references('id')->on('brand')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device');
    }
}
