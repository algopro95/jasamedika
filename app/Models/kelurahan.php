<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    public $table = 'kelurahans';

    public $fillable = [
        'nama_kelurahan',
        'nama_kecamatan',
        'nama_kota'
    ];

    protected $casts = [
        'nama_kelurahan' => 'string',
        'nama_kecamatan' => 'string',
        'nama_kota' => 'string'
    ];

    public static array $rules = [
        'nama_kelurahan' => 'required',
        'nama_kecamatan' => 'required',
        'nama_kota' => 'required'
    ];

    
}
