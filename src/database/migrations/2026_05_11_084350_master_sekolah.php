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
        schema::create('tingkat', function(Blueprint $table){
            $table->string('kode', 5)->unique();
            $table->string('name',50);
            $table->timestamps();
        });

        schema::create('jurusan', function(Blueprint $table){
            $table->id();
            $table->foreignId('tingkat_id')->constrained('tingkat')->cascadeOnDelete();
            $table->string('kode', 5)->unique();
            $table->string('name',50);
            $table->timestamps();
        });

        schema::create('kelas', function(Blueprint $table){
            $table->id();
            $table->foreignId('tingkat_id')->constrained('tingkat')->cascadeOnDelete();
            $table->string('kode', 5)->unique();
            $table->string('name',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahun_ajaran');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('jurusan');
        Schema::dropIfExists('tingkat');
    }
};
