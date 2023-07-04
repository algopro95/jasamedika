<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="pasiens-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Rt Rw</th>
                <th>Kelurahan</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pasiens as $pasien)
                <tr>
                    <td>{{ $pasien->id }}</td>
                    <td>{{ $pasien->nama_pasien }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->telp }}</td>
                    <td>{{ $pasien->rt_rw }}</td>
                    <td>{{ App\Models\kelurahan::where('id',$pasien->kelurahan)->first()->nama_kelurahan }}</td>
                    <td>{{ $pasien->tanggal_lahir }}</td>
                    <td>{{ $pasien->jenis_kelamin }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['pasiens.destroy', $pasien->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('pasiens.show', [$pasien->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('pasiens.edit', [$pasien->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $pasiens])
        </div>
    </div>
</div>
