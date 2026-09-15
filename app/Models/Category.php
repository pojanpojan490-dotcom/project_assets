<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function assets()
    {
        return $this->hasMany(Asset::class, 'category_id');
    }

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'category_id');
    }
}