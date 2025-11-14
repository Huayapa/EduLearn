<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'code',
        'name',
        'description',
        'status'
    ];

    public function courseOfferings()
    {
        return $this->hasMany(CourseOffering::class);
    }
}
