<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight_log extends Model
{
    use HasFactory;

    // weight_logs_table カラム
    protected $fillable = [
        'weight',
        'date',
        'calories',
        'exercise_time',
        'exercise_content',
        'user_id',
    ];

    protected $casts = [
        'weight' => 'decimal:1',
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }
}
