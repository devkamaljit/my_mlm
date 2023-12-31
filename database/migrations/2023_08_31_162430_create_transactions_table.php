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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('user_id')->references('id')->on('users');
            //$table->unsignedBigInteger('tx_user');
            //$table->foreign('tx_user')->references('id')->on('users')->nullable();
            $table->string('tx_user')->nullable();
            $table->double('amount', 8, 2)->default(0);
            $table->double('charges', 8, 2)->default(0);
            $table->string('tx_type')->nullable();
            $table->string('type')->nullable();
            $table->string('wallet')->nullable();
            $table->string('income')->nullable();
            $table->string('tx_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
