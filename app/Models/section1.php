<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section1 extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="checkaim_section1";
    protected $fillable = [
        'heading','text', 'button','link'
    ];
}
