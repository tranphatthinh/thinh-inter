<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $fillable = ['tenlop', 'hocky', 'nam', 'siso_max', 'subject_id'];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
