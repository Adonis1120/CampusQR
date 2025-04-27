<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'student_id', 'first_name', 'middle_initial',
        'last_name', 'suffix', 'guardian_name', 'relationship',
        'cp_number', 'qr_code'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
