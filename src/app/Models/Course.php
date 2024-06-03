<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Outros métodos e propriedades

    /**
     * The users that belong to the course.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('data_inscricao', 'valor_pago', 'status')->withTimestamps();
    }
}
