<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseAddModel extends Model
{
    use HasFactory;
    protected $fillabale = ['title', 'teacher_id', 'image', 'video', 'categoryId', 'total_lesson', 'total_hours', 'discount_price', 'final_price', 'description', 'status'];
    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function category()
    {
        return $this->belongsTo(categoryModel::class, 'categoryId'); // Adjust foreign key if needed
    }
}
