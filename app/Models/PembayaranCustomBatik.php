<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranCustomBatik extends Model
{
    protected $table = 'pembayaran_custom_batik';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = [
        'id_custom',
        'id_admin',
        'tgl',
        'total_harga',
        'metode_pembayaran'
    ];

    protected $casts = [
        'tgl' => 'date',
    ];

    public function customOrder()
    {
        return $this->belongsTo(CustomOrder::class, 'id_custom', 'id_custom');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
