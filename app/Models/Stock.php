<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['name', 'qty', 'images', 'expired', 'id_product', 'id_storage'];

    // public function lokasiPenyimpanan()
    // {
    //     return $this->belongsTo(StorageLocation::class, 'storage_loactions');
    // }
}
