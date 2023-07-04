<!-- Nama Pasien Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pasien', 'Nama Pasien:') !!}
    {!! Form::text('nama_pasien', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Telp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telp', 'Telp:') !!}
    {!! Form::text('telp', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Rt Rw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rt_rw', 'Rt Rw:') !!}
    {!! Form::text('rt_rw', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Kelurahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelurahan', 'Kelurahan:') !!}
    <select name="kelurahan" id="" class="form-control">
        @foreach($kelurahans as $kelurahan)
            @if(isset($kelurahan) and isset($pasien)))
            <option value="{{$kelurahan->id}}" <?php if($kelurahan->id == $pasien->kelurahan ?? null){echo "selected";} ?>>{{$kelurahan->nama_kelurahan}}</option>
            @else
            <option value="{{$kelurahan->id}}">{{$kelurahan->nama_kelurahan}}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::date('tanggal_lahir', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::text('jenis_kelamin', null, ['class' => 'form-control', 'required']) !!}
</div>
