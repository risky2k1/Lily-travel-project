<?php

use App\Models\Location;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Http;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('division_type');
            $table->string('phone_code');
            $table->string('is_feature')->nullable();
            $table->timestamps();
        });

        $response = Http::get('https://provinces.open-api.vn/api/?depth=1');
        $locations = $response->json();

        foreach ($locations as $location) {
            $item = Location::create([
                'name' => $location['name'],
                'division_type' => $location['division_type'],
                'phone_code' => $location['phone_code'],
            ]);

            if ($item && $item->division_type === 'thành phố trung ương') {
                $item->update([
                    'is_feature' => true,
                ]);
            }
        }
        Schema::table('hotels', function (Blueprint $table) {
            $table->foreignId('location_id')->nullable()->constrained('locations');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
