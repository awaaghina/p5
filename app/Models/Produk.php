<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['nama_produk','harga','deskripsi','id_kategori','id_merek','image'];

    public function merek(){
        return $this->BelongsTo(Merek::class, 'id_merek');
    }
    public function kategori(){
        return $this->BelongsTo(Kategori::class, 'id_kategori');
    }
}
