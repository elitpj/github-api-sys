<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->id();
            $table->string('owner');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('url');
            $table->boolean('is_archived');
            $table->boolean('is_fork');
            $table->boolean('is_disabled');
            $table->string('visibility');
            $table->string('language')->nullable();
            $table->string('default_branch')->nullable();
            $table->date('last_commit')->nullable();
            $table->integer('number_of_commits')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repositories');
    }
};
