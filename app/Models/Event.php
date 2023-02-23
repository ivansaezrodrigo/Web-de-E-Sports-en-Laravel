<?php

namespace App\Models;

/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    /*     use HasFactory; */
    // esta función se usa para relacionar los eventos con los usuarios
    public function users()
    {
        // un evento puede tener muchos usuarios
        return $this->belongsToMany(User::class);
    }
}
