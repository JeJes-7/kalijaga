<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'pelanggaran',
        'bidang',
        'tingkat',
        'status',
        'tanggal_pelanggaran',
    ];

    /**
     * Get the santri that owns the violation.
     */
    public function santri(): BelongsTo
    {
        return $this->belongsTo(Santri::class);
    }
}