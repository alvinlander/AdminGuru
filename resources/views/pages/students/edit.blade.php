@extends('layouts.index')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Edit Student {{$data->nama}}</h1>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Form Edit</div>
        <div class="card-body">
            {!! Form::open(['route' => ['student.update',$data->id], 'method' => 'put', 'files' => true]) !!}
            <div class="form-group">
                <label for="">Nama</label>
                <br>
                {!! Form::text('nama', $data->nama, ['class' => $errors->has('nama') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <br>
                {!! Form::file('foto', null, [
                    'class' => $errors->has('foto') ? 'form-control is-invalid' : 'form-control']) !!}
                @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <br>
                {!! Form::textarea('alamat', $data->alamat, [
                    'class' => $errors->has('alamat') ? 'form-control is-invalid' : 'form-control',
                    'cols' => "10",
                    'rows' => "3",
                
                ]) !!}
                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Kelas</label>
                <br>
                {!! Form::text('kelas', $data->kelas, [
                    'class' => $errors->has('kelas') ? 'form-control is-invalid' : 'form-control',
                
                ]) !!}
                @error('kelas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
