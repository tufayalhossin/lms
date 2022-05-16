<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected  $fillable = [
        'title',
        'description',
        'user_id',
        'subcategories_id',
        'created_at',
        'updated_at'
    ];
}
