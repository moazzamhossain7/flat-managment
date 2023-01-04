<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lot extends Model
{
    use Uuids, HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'location_id',
        'name',
        'type',
        'address',
        'description',
        'property_id',
        'lot_area',
        'home_area',
        'rooms',
        'beds',
        'baths',
        'built',
        'price',
        'feature',
        'amenities',
        'lat',
        'lang',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'feature' => 'array', 
        'amenities' => 'array', 
    ];

    /**
     * Add query scope to filter user by role
     * 
     * @param Builder $query
     */
    public function scopeOfRent($query)
    {
        return $query->whereStatus('for rent');
    }

    public function lotPictures() {
        return $this->hasMany(LotPicture::class);
    }

    public function location() {
        return $this->belongsTo(Location::Class);
    }

    public function owner() {
        return $this->belongsTo(User::Class, 'owner_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
