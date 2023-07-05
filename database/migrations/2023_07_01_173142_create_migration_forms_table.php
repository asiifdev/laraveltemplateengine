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
        Schema::create('migration_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('migration_name');
            $table->unsignedInteger('migration_id');
            $table->foreign('migration_id')->references('id')->on('migrations');
            $table->string('column');
            $table->string('type');
            $table->string('default')->nullable();
            $table->string('extra')->nullable();
            $table->json('enum')->nullable();
            $table->boolean('nullable')->default(true);
            $table->boolean('is_show')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('migration_forms');
    }
};
