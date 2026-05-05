<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Faculty extends Model
{
    //
    protected $fillable = ['makhoa', 'tenkhoa'];
    
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
