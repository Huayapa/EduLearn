<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $table = 'specialties';
    protected $fillable = [
        'name', 
        'description'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
