<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    use HasFactory;
    protected $fillabale=['id','name','image','description'];
    public function courses()
    {
        return $this->hasMany(courseAddModel::class, 'categoryId');
    }
}
