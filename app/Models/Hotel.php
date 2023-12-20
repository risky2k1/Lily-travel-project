<?php

namespace App\Models;

use App\Models\States\HotelState\HotelState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\ModelStates\HasStates;

class Hotel extends Model
{
    use HasFactory;
    use HasStates;

    protected $fillable = [
        'name',
        'description',
        'content',
        'is_feature',
        'author',
        'state',
        'map',
        'address',
        'price',
        'checkin_time',
        'checkout_time',
    ];
    protected $casts = [
        'state' => HotelState::class,
    ];

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class,'hotel_types','hotel_id','type_id');
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class,'hotel_facilities','hotel_id','facility_id');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class,'hotel_services','hotel_id','service_id');
    }
}
