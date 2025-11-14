<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name',
        'code',
        'email',
        'dni',
        'academic_status',
        'status',
        'semester',
        'date_of_birth'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
