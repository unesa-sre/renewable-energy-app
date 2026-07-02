<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Research extends Model
{
    use HasFactory, SoftDeletes;
    
    // Explicitly set table name since plural of research is research
    protected $table = 'research';
    
    protected $fillable = ['title', 'description', 'file_path', 'image'];
}
