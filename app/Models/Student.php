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

    public function courses()
    {
        return $this->hasManyThrough(
        Course::class,            // Modelo final
        Enrollment::class,        // Modelo intermedio
        'student_id',             // FK en enrollments -> student_id
        'id',                     // FK en courses -> id (primary key)
        'id',                     // PK en students
        'course_offering_id'      // FK en enrollments -> course_offering_id
        )->join('course_offerings', 'course_offerings.id', '=', 'enrollments.course_offering_id')
        ->select('courses.*');
    }



}
