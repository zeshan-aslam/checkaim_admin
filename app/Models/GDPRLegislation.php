<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GDPRLegislation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'text'
    ];
    protected $table = 'gdpr_legislation';
}
