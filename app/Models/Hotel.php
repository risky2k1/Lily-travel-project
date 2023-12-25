<?php

namespace App\Models;

use App\Models\States\HotelState\HotelState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\ModelStates\HasStates;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model implements HasMedia
{
    use HasFactory;
    use HasStates;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $table = 'hotels';

    protected $fillable = [
        'name',
        'description',
        'content',
        'is_feature',
        'author_id',
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

    public function bookings(): MorphMany
    {
        return $this->morphMany(Booking::class, 'modelType');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hotel-images');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'hotel_types', 'hotel_id', 'type_id');
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'hotel_facilities', 'hotel_id', 'facility_id');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'hotel_services', 'hotel_id', 'service_id');
    }
}
