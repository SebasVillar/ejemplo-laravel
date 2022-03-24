<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'Employee';
    protected $fillable = [
        'name', 'age', 'job', 'salary', 'company'
    ];
    // protected $appends = ['prueba'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'SkillEmployee', 'employee', 'skill');
    }

    public function getPruebaAttribute()
    {
        return "neeee";
    }
}
