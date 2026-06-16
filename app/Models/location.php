<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $fillable = [
        'location_name',
        'max_motorcycle',
        'max_car',
        'max_other'
    ];

    function transaction()
    {
        return $this->hasMany(transaction::class, 'id_lokasi', 'id');
    }

    public function getSlot($id_jenis)
    {
        $fill = transaction::where('id_lokasi', $this->id)
            ->where('id_jenis', $id_jenis)
            ->whereNull('keluar')
            ->count();

        if ($id_jenis == 'motorcycle') {
            return $this->max_motorcycle - $fill;
        } elseif ($id_jenis == 'car') {
            return $this->max_car - $fill;
        } else {
            return $this->max_other - $fill;
        }
    }
}
