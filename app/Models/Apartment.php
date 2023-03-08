<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'city',
        'postal_code',
        'rented_price',
        'rented',
        'user_id',
    ];

    protected $table = 'apartment';

    protected $timpestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class, 'platform_apartment');
    }
    // In the Apartment model
    public function manager()
    {
    return $this->belongsTo(User::class, 'user_id');
    }   
}
