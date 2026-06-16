<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vehicle_type extends Model
{

    protected $fillable = [
        'jenis',
        'perjam_pertama',
        'perjam_berikutnya',
        'max_perhari'
    ];

    function transaction() {
        return $this->hasMany(transaction::class, 'id_jenis', 'id');
    }
}
