<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profileModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'image',
        'skill',
        'about',
        'phone_number',
        'nationality',
        'education_description',
        'education_title',
        'education_date',
        'experience_title',
        'experience_description',
        'experience_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
