<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region_id',
        // ... other customer attributes
    ];

    // Define the relationship with the Region model
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
