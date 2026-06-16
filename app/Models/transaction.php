<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{

    protected $guarded = ['id'];

    protected $fillable = [
        'id_lokasi',
        'no_ticket',
        'no_polisi',
        'id_jenis',
        'masuk',
        'keluar',
        'perjam_pertama',
        'perjam_berikutnya',
        'max_perhari',
        'total_jam',
        'total_bayar'
    ];

    function location() {
        return $this->belongsTo(location::class, 'id_lokasi');
    }

    function vehicle_type() {
        return $this->belongsTo(vehicle_type::class, 'id_jenis');
    }
}
