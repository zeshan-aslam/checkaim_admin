<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsConditions extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'text'
    ];
    protected $table = 'termsconditions';
}
