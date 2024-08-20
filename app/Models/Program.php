<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Program extends Model
{
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];
    public function courses() {
        return $this->hasMany(Course::class);
    }
}
