<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrgInfo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'org_name',
        'logo',
        'phone',
        'email',
        'hotline_numbers',
        'skype',
        'office_time',
        'address',
        'social_links',
        'google_api_key',
        'lat',
        'lang',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'social_links' => 'object',
    ];

    /**
     * Get org info from cache if exists otherwise get and set to cache.
     *
     * @return mixed
     */
    public static function getOrgInfo()
    {
        return Cache::rememberForever('org_info', function () {
            return self::first();
        });
    }

}
