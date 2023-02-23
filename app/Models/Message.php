<?php

namespace App\Models;

/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    /* use HasFactory; */
    // Relación de muchos a uno
    public function users(){
        // Un mensaje pertenece a un usuario
        return $this->belongsTo(User::class);
    }
}
