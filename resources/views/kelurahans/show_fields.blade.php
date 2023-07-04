<!-- Nama Kelurahan Field -->
<div class="col-sm-12">
    {!! Form::label('nama_kelurahan', 'Nama Kelurahan:') !!}
    <p>{{ $kelurahan->nama_kelurahan }}</p>
</div>

<!-- Nama Kecamatan Field -->
<div class="col-sm-12">
    {!! Form::label('nama_kecamatan', 'Nama Kecamatan:') !!}
    <p>{{ $kelurahan->nama_kecamatan }}</p>
</div>

<!-- Nama Kota Field -->
<div class="col-sm-12">
    {!! Form::label('nama_kota', 'Nama Kota:') !!}
    <p>{{ $kelurahan->nama_kota }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kelurahan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kelurahan->updated_at }}</p>
</div>

