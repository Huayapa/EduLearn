<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    const ACADEMIC_STATUS = ['activo', 'retirado', 'terminado'];
    const STATUS = ['active', 'inactive'];

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
