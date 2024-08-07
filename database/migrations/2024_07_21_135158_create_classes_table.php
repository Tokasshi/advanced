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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('className', 100);
            $table->text('description');
            $table->float('capacity');
            $table->float('price');
            $table->boolean('full');
            $table->string('image')->nullable();
            $table->softDeletes();
            // $table->timestamp('timeTo');
            // $table->timestamp('timeFr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
