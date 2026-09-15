<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyusutan extends Model
{
    protected $fillable = [
        'nama_aset',
        'harga_perolehan',
        'umur_ekonomis',
        'nilai_penyusutan',
        'nilai_buku',
        'tanggal_penyusutan',
    ];
}