<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'birth_date',
        'phone',
        'gender',
        'address',
        'occupation',
        'diagnosis',
        'couple_code',
        'partner_patient_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
