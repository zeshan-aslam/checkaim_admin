<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section3_card extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="section3_card";
    protected $fillable = [
        'main_heading','text', 'heading','list_text'
    ];
}
