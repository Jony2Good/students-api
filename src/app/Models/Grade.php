<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $timestamps = false;

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'grade_id');
    }

    public function gradeLectures(): HasMany
    {
        return $this->hasMany(GradeLecture::class, 'grade_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($grade) {
           Student::where('grade_id', $grade->id)->update(['grade_id' => null]);
        });
    }
}
