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
        Schema::create('dashboard_layouts', function (Blueprint $table) {
            $colors = [
                "light-blue",
                "dark-blue",
                "light-teal",
                "dark-teal",
                "light-sky",
                "dark-sky",
                "light-red",
                "dark-red",
                "light-green",
                "dark-green",
                "light-lime",
                "dark-lime",
                "light-pink",
                "dark-pink",
                "light-purple",
                "dark-purple",
            ];
            $table->id();
            $table->enum('footer', ['true', 'false'])->default('true');
            $table->enum('placement', ['vertical', 'horizontal'])->default('vertical');
            $table->enum('behaviour', ['pinned', 'unpinned'])->default('pinned');
            $table->enum('layout',['boxed', 'fluid'])->default('boxed');
            $table->enum('radius',['rounded', 'standard', 'flat'])->default('rounded');
            $table->enum('color',$colors)->default('dark-purple');
            $table->enum('navcolor',['default', 'light', 'dark'])->default('default');
            // $table->string('storagePrefix')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_layouts');
    }
};
