<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'id_transaksi',
        'jenis',
        'status',
        'jumlah',
    ];

    /**
     * Get the santri that owns the transaction.
     */
    public function santri(): BelongsTo
    {
        return $this->belongsTo(Santri::class);
    }
}