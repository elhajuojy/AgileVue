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
        Schema::create('versions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("project_id")->constrained();
            $table->string("name");
            $table->string("description");
            $table->string("status");
            $table->date("release_date");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("type");
            $table->string("archived");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versions');
    }
};
