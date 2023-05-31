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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('duration');
            $table->enum('status',['Pending','Renting','Rejected','Completed'])->default('Pending');
            $table->text('remark');
            $table->decimal('price',8,2);
            $table->enum('with_driver',['Yes', 'No'])->default('No');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('van_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('van_id')->references('id')->on('vans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
