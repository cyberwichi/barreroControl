<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class horario extends Model

{

    protected $fillable = [
        'fecha', 'turno','user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
