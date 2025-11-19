<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    const STATUSENTROLLEMNT = ['inscrito', 'completado', 'retirado'];
    const STATUS = ['active', 'inactive'];
    protected $table = 'enrollments';

    protected $fillable = [
        'student_id',
        'course_offering_id',
        'status_enrollment',
        'status',
        'final_grade',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function courseOffering()
    {
        return $this->belongsTo(CourseOffering::class);
    }
}
