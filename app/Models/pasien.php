<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    public $table = 'pasiens';

    public $fillable = [
        'id',
        'nama_pasien',
        'alamat',
        'telp',
        'rt_rw',
        'kelurahan',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    protected $casts = [
        'nama_pasien' => 'string',
        'alamat' => 'string',
        'telp' => 'string',
        'rt_rw' => 'string',
        'kelurahan' => 'string',
        'tanggal_lahir' => 'string',
        'jenis_kelamin' => 'string'
    ];

    public static array $rules = [
        'nama_pasien' => 'required',
        'alamat' => 'required',
        'telp' => 'required',
        'rt_rw' => 'required',
        'kelurahan' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required'
    ];



}
