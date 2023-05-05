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
        Schema::create('costumers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('phone');
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('debt')->default(0);
            $table->text('trust_status')->nullable();


//            $table->unsignedBigInteger('user_id')->index()->nullable();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costumers');
    }
};
