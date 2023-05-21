<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teams extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $timestamps = false;
    protected $fillable = ['name', 'image'];
    public function tournaments()
    {
        return $this->belongsToMany(Tournaments::class)->withPivot('teams_id', 'tournaments_id');
    }
    public function players()
    {
        return $this->hasMany(Players::class);
    }
}