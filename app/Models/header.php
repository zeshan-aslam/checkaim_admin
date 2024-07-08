<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class header extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="checkaim_header";
    protected $fillable = [
        'logo','login', 'signup'
    ];
    // protected $table = "mytablename";
}
