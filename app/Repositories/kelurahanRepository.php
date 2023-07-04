<?php

namespace App\Repositories;

use App\Models\kelurahan;
use App\Repositories\BaseRepository;

class kelurahanRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama_kelurahan',
        'nama_kecamatan',
        'nama_kota'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return kelurahan::class;
    }
}
