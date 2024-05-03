<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    // If we use the ::create method, it will not work unless we tweak
    // the mass assignment rules like so: Choose one

    // All entries welcome (for lazy dev's)
    // protected $guarded = [];

    // select entries
    protected $fillable = ['name', 'path', 'user_id'];
}
