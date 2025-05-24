<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //konfigurasi mass assigment tabel gurus, daftar field yang bisa di mass assigment
    protected $fillable = ['nama', 'nip', 'gender', 'alamat', 'kontak', 'email'];

    //function relasi antara tabel guru dengan tabel pkls one to many
    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }
}