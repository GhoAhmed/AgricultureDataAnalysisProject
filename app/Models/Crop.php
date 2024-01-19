<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'yield', 'planting_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
