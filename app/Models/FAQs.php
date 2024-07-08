<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQS extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'text'
    ];
    protected $table = 'faqs';
}
