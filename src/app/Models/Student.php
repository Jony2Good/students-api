<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'grade_id'];

    public $timestamps = false;

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classLectures(): hasManyThrough
    {
        return $this->hasManyThrough(Lecture::class, GradeLecture::class, 'grade_id', 'id', 'grade_id', 'lecture_id');
    }
}
