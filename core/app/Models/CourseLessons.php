<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLessons extends Model
{
    use HasFactory;
    protected  $fillable = [
        'title',
        'sortindex',
        'lession_id',
        'section_id',
        'resourse',
        'extra_resourse',
        'lecture_description',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function mediaFirst(){
        return $this->hasMany('App\Models\CourseMediaOverviews','lesson_id','id')->where('status',1)->first();
    }
    public function media(){
        return $this->hasMany('App\Models\CourseMediaOverviews','lesson_id','id')->where('status',1);
    }
}
