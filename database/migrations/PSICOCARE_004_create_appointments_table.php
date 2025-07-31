<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ['individual', 'couple']);
            $table->dateTime('date');
            $table->string('status')->default('pending');

            // Relaciones
            $table->unsignedBigInteger('patient_id'); // paciente principal
            $table->unsignedBigInteger('partner_id')->nullable(); // pareja si aplica

            $table->timestamps();

            // Claves foráneas
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('patients')->onDelete('set null');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
