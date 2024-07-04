<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseAddModel extends Model
{
    use HasFactory;
    protected $fillabale=['title','instructor_id','image','video','category','total_lesson','total_hours','discount_price','final_price','description'];
}
