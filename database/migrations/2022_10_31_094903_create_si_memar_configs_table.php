<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('si_memar_configs', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('SiMemar');
            $table->string('favicon')->default('/storage/default/favicon.ico');
            $table->string('card_front_img')->nullable();
            $table->string('card_back_img')->nullable();
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
        Schema::dropIfExists('si_memar_configs');
    }
};