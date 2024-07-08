<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section3_main extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="checkaim_section3_main";
    protected $fillable = [
        'heading','text', 'bottom_text','bottom_highlight_text'
    ];
}
