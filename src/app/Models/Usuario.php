<?php

namespace App\Models;

// use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    // use Notifiable;

    protected $table = 'usuario';
}
