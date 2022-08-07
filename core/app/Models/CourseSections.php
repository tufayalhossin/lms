<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function lessons(){
        return $this->hasMany('App\Models\CourseLessons','section_id','id')->where('status',1);
    }
}
