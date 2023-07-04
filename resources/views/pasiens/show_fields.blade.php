<!-- Nama Pasien Field -->
<div class="col-sm-12">
    {!! Form::label('nama_pasien', 'Nama Pasien:') !!}
    <p>{{ $pasien->nama_pasien }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $pasien->alamat }}</p>
</div>

<!-- Telp Field -->
<div class="col-sm-12">
    {!! Form::label('telp', 'Telp:') !!}
    <p>{{ $pasien->telp }}</p>
</div>

<!-- Rt Rw Field -->
<div class="col-sm-12">
    {!! Form::label('rt_rw', 'Rt Rw:') !!}
    <p>{{ $pasien->rt_rw }}</p>
</div>

<!-- Kelurahan Field -->
<div class="col-sm-12">
    {!! Form::label('kelurahan', 'Kelurahan:') !!}
    <p>{{ $pasien->kelurahan }}</p>
</div>

<!-- Tanggal Lahir Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    <p>{{ $pasien->tanggal_lahir }}</p>
</div>

<!-- Jenis Kelamin Field -->
<div class="col-sm-12">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <p>{{ $pasien->jenis_kelamin }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pasien->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pasien->updated_at }}</p>
</div>

