<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Outros métodos e propriedades

    /**
     * The courses that belong to the user.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class)->withPivot('data_inscricao', 'valor_pago', 'status')->withTimestamps();
    }
}
