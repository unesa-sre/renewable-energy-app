<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'location', 'date', 'description', 'image', 'gallery_images', 'participants'];

    protected $casts = [
        'date'          => 'date',
        'participants'  => 'array',
        'gallery_images'=> 'array',
    ];

    public function getCleanDescriptionAttribute(): string
    {
        if (empty($this->description)) {
            return 'Tidak ada deskripsi.';
        }

        $text = html_entity_decode($this->description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = str_replace(['&nbsp;', 'nbsp;'], ' ', $text);
        $text = strip_tags($text);
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = trim(preg_replace('/[\s\x{00a0}]+/u', ' ', $text));

        return $text !== '' ? $text : 'Tidak ada deskripsi.';
    }
}
