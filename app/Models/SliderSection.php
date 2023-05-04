<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'slider_sections';
    protected $fillable = ['slider_description','button_url', 'slider_image', 'status'];
}
