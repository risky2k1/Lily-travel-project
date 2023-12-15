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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();

            $table->foreignId('author')->constrained('user');
            

            $table->string('state');

            $table->text('description')->comment('Mô tả');
            $table->longText('content')->comment('Nội dung');
            $table->text('map');
            $table->string('address');
            $table->decimal('price');

            $table->string('checkin_time');
            $table->string('checkout_time');

            $table->boolean('is_feature');

            $table->integer('max_guests')->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
