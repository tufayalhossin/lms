<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseMediaOverviews extends Model
{
    use HasFactory;
    
    protected  $fillable = [
        'type',
        'sortindex',
        'lesson_id',
        'resourse',
        'resourse_name',
        'duration',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
