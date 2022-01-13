<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescNilai extends Model
{
    protected $fillable = ['guru_id', 'kkm', 'deskripsi_a', 'deskripsi_b', 'deskripsi_c', 'deskripsi_d'];

    public function guru()
    {
        return $this->belongsTo('App\Guru')->withDefault();
    }

    protected $table = 'desc_nilai';
}
