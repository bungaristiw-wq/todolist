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
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('todolist_id');
        $table->string('judul_task');
        $table->boolean('is_done')->default(false);
        $table->timestamps();

        $table->foreign('todolist_id')->references('id')->on('todolist')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::dropIfExists('tasks');
}

};
