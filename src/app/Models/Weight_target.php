<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight_target extends Model
{
    use HasFactory;

    // weight_target_table カラム
    protected $fillable = [
        'user_id',
        'target_weight',
    ];

    protected $casts = [
        'target_weight' => 'decimal:1',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
