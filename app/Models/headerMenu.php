<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class headerMenu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="checkaim_headermenu";
    protected $fillable = [
        'menu_link','menu_name','link_modal'
    ];
}
