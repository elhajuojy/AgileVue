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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->constrained()->cascadeOnUpdate();
            $table->string("name");
            $table->string("description");
            $table->string("project_key");
            $table->string("project_type");
            $table->string("project_lead");
            $table->string("project_url");
            $table->string("project_avatar");
            $table->string("project_cover");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
