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
        Schema::create('info_lots', function (Blueprint $table) {
            $table->id();
            $table->text('link_page')->nullable();
            $table->text('information_property')->nullable();
            $table->string('initial_price')->nullable();
            $table->string('e_mail')->nullable();
            $table->string('phone')->nullable();
            $table->string('inn')->nullable();
            $table->string('number_bankruptcy_case')->nullable();
            $table->string('trading_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_lots');
    }
};
