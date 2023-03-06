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
        Schema::create('sprints', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("project_id")->constrained();
            $table->string("name");
            $table->string("description");
            $table->string("start_date");
            $table->string("end_date");
            $table->string("status");
            $table->string("goal");
            $table->string("project_key");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sprints');
    }
};
