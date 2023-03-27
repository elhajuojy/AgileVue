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
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->renameColumn("project_key", "key");
            $table->renameColumn("project_type", "type");
            $table->renameColumn("project_lead", "lead");
            $table->renameColumn("project_url", "url");
            $table->renameColumn("project_avatar", "avatar");
            $table->renameColumn("project_cover", "cover");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->renameColumn("key", "project_key");
            $table->renameColumn("type", "project_type");
            $table->renameColumn("lead", "project_lead");
            $table->renameColumn("url", "project_url");
            $table->renameColumn("avatar", "project_avatar");
            $table->renameColumn("cover", "project_cover");



        });
    }
};
