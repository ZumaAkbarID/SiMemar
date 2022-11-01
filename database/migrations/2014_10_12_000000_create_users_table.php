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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->text('address');
            $table->string('position')->nullable();
            $table->text('skill')->nullable();
            $table->timestamp('contract_start')->nullable();
            $table->timestamp('contract_end')->nullable();
            $table->timestamp('account_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('account_verified_by')->nullable();
            $table->string('profile_img')->nullable();
            $table->enum('role', ['CEO', 'Pengurus', 'Member']);
            $table->enum('status', ['Aktif', 'Non Aktif']);
            $table->string('acc_code');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};