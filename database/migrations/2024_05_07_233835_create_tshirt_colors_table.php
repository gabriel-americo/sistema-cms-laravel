<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tshirt_colors', function (Blueprint $table) {
            $table->id();
            $table->string('color', 80);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tshirt_colors');
    }
};
