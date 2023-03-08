<?php

namespace App\Models;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner',
    ];

    protected $table = 'platform';

    public $timestamps = false;

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}
