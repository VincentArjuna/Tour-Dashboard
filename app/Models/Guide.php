<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    /** @use HasFactory<\Database\Factories\GuideFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'identity_type',
        'identity_number',
        'name',
        'date_of_birth',
        'bio',
        'languages',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
