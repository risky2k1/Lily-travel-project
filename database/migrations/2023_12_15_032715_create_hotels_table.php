<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();

            $table->foreignId('author_id')->constrained('users');


            $table->string('state');

            $table->string('name');
            $table->text('description')->comment('Mô tả');
            $table->longText('content')->comment('Nội dung');
            $table->text('map')->nullable();
            $table->string('address')->nullable();
            $table->decimal('price')->nullable();

            $table->string('checkin_time')->nullable();
            $table->string('checkout_time')->nullable();

            $table->boolean('is_feature')->nullable();

            $table->integer('max_guests')->nullable()->default(0);
            $table->softDeletes();

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
