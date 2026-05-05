<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty;

class Subject extends Model
{
    //
    protected $fillable = ['mamon', 'tenmon', 'sotinchi', 'faculty_id'];

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }

    public function classrooms() {
        return $this->hasMany(Classroom::class);
    }
}
