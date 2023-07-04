<?php

namespace App\Repositories;

use App\Models\pasien;
use App\Repositories\BaseRepository;

class pasienRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama_pasien',
        'alamat',
        'telp',
        'rt_rw',
        'kelurahan',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return pasien::class;
    }
}
