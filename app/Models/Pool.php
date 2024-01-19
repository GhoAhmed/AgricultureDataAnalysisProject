<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'water_level'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
