<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'course_id',
        'user_id',
        'data_inscricao',
        'valor_pago',
        'status',
    ];

    /**
     * Get the course that owns the CourseUser.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the user that owns the CourseUser.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
