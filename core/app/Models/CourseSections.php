<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSections extends Model
{
    use HasFactory;
    
    protected  $fillable = [
        'title',
        'sortindex',
        'course_id',
        'quiz_required',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function leasons(){
        return $this->hasMany('App\Models\CourseLessons','section_id','id')->where('status',1);
    }
}
