<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOffering extends Model
{
    const SEMESTER = ['1', '2', '3', '4', '5', '6', '7', '8'];
    const SHIFT = ['mañana', 'tarde', 'noche'];
    const MODALITY = ['presencial', 'virtual', 'hibrido'];
    const STATUSCO = ['active', 'inactive'];
    protected $table = 'course_offerings';

    protected $fillable = [
        'course_id',
        'teacher_id',
        'semester',
        'year',
        'shift',
        'classroom',
        'modality',
        'status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
