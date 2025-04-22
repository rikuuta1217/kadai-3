<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    // 日付による検索処理を再利用可能にしたカスタムメソッド laravelのクエリスコープ機能
    public function scopeDateSearch(Builder $query, $startDate, $endDate)
    {
        if(!empty($startDate) && !empty($endDate)) {
            return $query->whereBetween('date' , [$startDate, $endDate]);
        } elseif (!empty($startDate)) {
            return $query->where('date', '>=', $startDate);
        } elseif (!empty($endDate)) {
            return $query->where('date', '<=', $endDate);
        }

        return $query;
    }

}
