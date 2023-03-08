<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformApartment extends Model
{
    use HasFactory;

    protected $table = 'platformApartment';

    protected $fillable = [
        'register_date',
        'premium',
        'platform_id',
        'apartment_id'
    ];

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
