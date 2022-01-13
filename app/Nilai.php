<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['siswa_id', 'kelas_id', 'guru_id', 'mapel_id', 'ulha_1', 'ulha_2', 'ulha_3', 'ulha_4', 'ulha_5', 'ulha_6', 'uts', 'uas'];

    protected $table = 'nilai';
}
