<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\Option;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'quiz_id',
        'duration',
        'order',
        'status',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
