<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartModel extends Model
{
    use HasFactory;
    protected $fillabale = ['course_id', 'user_id'];
    public function course()
    {
        return $this->belongsTo(courseAddModel::class, 'course_id');
    }
    public function user(){
        return $this->belongsTo(user::class, 'user_id');

    }
}
