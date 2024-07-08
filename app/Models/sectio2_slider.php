<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectio2_slider extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="checkaim_section2_slider";
    protected $fillable = [
        'heading','text', 'address','url'
    ];
}
