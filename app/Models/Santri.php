<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kamar',
        'status',
        'tanggal_masuk',
        'no_telpon',
    ];

    /**
     * Get the user that owns the santri profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the transactions for the santri.
     */
    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }

    /**
     * Get the violations for the santri.
     */
    public function pelanggarans(): HasMany
    {
        return $this->hasMany(Pelanggaran::class);
    }
}