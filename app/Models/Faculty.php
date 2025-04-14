<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $fillable = [
        'name',
        'university_id',
        'description',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function interests()
    {
        return $this->hasMany(FacultyInterest::class);
    }
}
