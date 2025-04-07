<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('status', 50)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('uploaded_by', 20)->nullable();

            $table->unsignedBigInteger('lettertype_id');
            $table->unsignedBigInteger('mahasiswa_id');

            $table->foreign('lettertype_id')->references('id_type')->on('lettertype');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
