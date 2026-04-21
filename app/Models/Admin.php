<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['nama_admin'];

    public function pembayaran()
    {
        return $this->hasMany(PembayaranCustomBatik::class, 'id_admin', 'id_admin');
    }
}
