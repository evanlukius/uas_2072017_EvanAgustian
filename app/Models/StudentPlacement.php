<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPlacement extends Model
{
    protected $fillable = ['student_nim', 'period_id', 'class'];

    public function student() {
        return $this->belongsTo(Student::class, 'student_nim', 'nim');
    }

    public function period() {
        return $this->belongsTo(Period::class);
    }
}
