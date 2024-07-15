<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentModel extends Model
{
    use HasFactory;
    protected $fillabale=['user_id','course_id'];
    public function courses()
    {
        return $this->belongsTo(courseAddModel::class, 'course_id'); // Assuming courseAddModel is the correct class for courses
    }
}
