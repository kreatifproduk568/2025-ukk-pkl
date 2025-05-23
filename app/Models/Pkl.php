<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    protected $fillable = ['guru_id','siswa_id','industri_id','mulai','selesai'];
    protected $casts = [
        'mulai' => 'date',
        'selesai' => 'date',
    ];

    //relasi antara tabel pkls ke tabel gurus many to one
    public function guru() {
        return $this->belongsTo(Guru::class);
    }

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }

    public function industri() {
        return $this->belongsTo(Industri::class);
    }

    protected $table = 'pkls';

    public function getDurasiAttribute()
    {
        // return $this->selesai->diffInDays($this->mulai);
        return $this->mulai->diffInDays($this->selesai);
    }
}