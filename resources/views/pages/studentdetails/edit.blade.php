@extends('layouts.index');

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Edit Score {{$data->students->nama}}</h1>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-clipboard mr-1"></i>Form Input</div>
            <div class="card-body card-block">
                {!! Form::open(['route' => ['studentdetail.update',$data->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        <label for="">IPA</label>
                        <br>
                        {!! Form::number('ipa', $data->ipa, [
                            'class' => $errors->has('ipa') ? 'form-control is-invalid' : 'form-control',
                        
                        ]) !!}
                        @error('ipa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">IPS</label>
                        <br>
                        {!! Form::number('ips', $data->ips, [
                            'class' => $errors->has('ips') ? 'form-control is-invalid' : 'form-control',
                        
                        ]) !!}
                        @error('ips')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Matematika</label>
                        <br>
                        {!! Form::number('matematika', $data->matematika, [
                            'class' => $errors->has('matematika') ? 'form-control is-invalid' : 'form-control',
                        
                        ]) !!}
                        @error('matematika')
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