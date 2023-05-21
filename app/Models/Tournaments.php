<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournaments extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function teams()
    {
        return $this->belongsToMany(Teams::class)->withPivot('teams_id', 'tournaments_id');
    }
}
