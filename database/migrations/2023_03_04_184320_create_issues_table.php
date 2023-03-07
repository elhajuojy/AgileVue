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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->constrained()->cascadeOnUpdate();
            $table->foreignId("sprint_id")->constrained()->cascadeOnUpdate();
            $table->string("title");
            $table->string("description");
            $table->string("status")->default("Story");
            $table->string("priority");
            $table->string("type");
            $table->string("assignee");
            $table->string("reporter");
            $table->string("epic");
            $table->string("story_points");
            $table->string("time_estimate");
            $table->string("time_spent");
            $table->string("time_remaining");
            $table->string("resolution");
            $table->string("resolution_date");
            $table->string("due_date");
            $table->string("created");
            $table->string("updated");
            $table->string("labels");
            $table->string("components");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
