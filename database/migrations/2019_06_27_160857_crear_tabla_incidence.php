<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaIncidence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description');
            $table->longText('diagnostic');
            $table->string('score', 100);
            $table->string('evidence', 100)->nullable();
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id', 'fk_incidence_state')->references('id')->on('state')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('device_id');
            $table->foreign('device_id', 'fk_incidence_device')->references('id')->on('device')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('functionary_id');
            $table->foreign('functionary_id', 'fk_incidence_personal_data')->references('id')->on('personal_data')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_incidence_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('f_total', 100)->nullable(); // == updated_at - created_at
            $table->string('t_response', 100)->nullable(); // == cuando se vea, se asigna una marca de time, y despues se resta con el update_at
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
        Schema::dropIfExists('incidence');
    }
}
