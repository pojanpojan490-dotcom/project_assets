<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'category_id',
        'jumlah',
        'tanggal_beli',
        'harga_beli',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function stok()
    {
        return $this->hasOne(Stok::class, 'barang_id', 'id_barang');
    }
}