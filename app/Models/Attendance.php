<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    //use HasFactory;

    protected $fillable = [
        'student_id',
        'date',
        'status',
        'time_in',
        'time_out',
        'recorded_by',
        'remarks'
    ];

    protected $casts = [
        'date' => 'date',
        'time_in' => 'datetime:H:i',
        'time_out' => 'datetime:H:i',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
