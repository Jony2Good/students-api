<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public $timestamps = false;

    public function classLectures(): HasMany
    {
        return $this->hasMany(GradeLecture::class, 'lecture_id');
    }

    public function grades(): BelongsToMany
    {
        return $this->belongsToMany(Grade::class, 'grade_lectures', 'lecture_id', 'grade_id');
    }

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(Student::class,GradeLecture::class,'lecture_id', 'grade_id','id', 'grade_id');
    }
}
