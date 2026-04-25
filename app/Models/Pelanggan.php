<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'email',
        'nomor_telepon',
        'alamat',
        'password'
    ];

    public function customOrders()
    {
        return $this->hasMany(CustomOrder::class, 'id_pelanggan', 'id_pelanggan');
    }
}