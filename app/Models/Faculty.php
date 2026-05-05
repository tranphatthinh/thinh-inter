<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //
    protected $fillable = ['makhoa', 'tenkhoa'];
    
    public function monhocs()
    {
        return $this->hasMany(Subject::class, 'khoa_id');
    }
}
