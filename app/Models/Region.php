<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kota',
        'nama_daerah',
        // ... other attributes you want to allow mass assignment for
    ];
}
