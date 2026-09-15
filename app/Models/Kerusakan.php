<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $fillable = [
        'asset_id',
        'nama_barang',
        'jenis_kerusakan',
        'tanggal_kerusakan',
        'status',
        'keterangan',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}