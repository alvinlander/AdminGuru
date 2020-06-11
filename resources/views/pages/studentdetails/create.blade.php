@extends('layouts.index');

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Add Score</h1>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-clipboard mr-1"></i>Form Input</div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'studentdetail.store', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group">
                        <label for="">Student Name</label>
                        <br>
                        {!! Form::select('student_id', $data,[
                            'class' => $errors->has('student_id') ? 'form-control is-invalid' : 'form-control']); !!}
                        @error('student_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">IPA</label>
                        <br>
                        {!! Form::number('ipa', null, [
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
                        {!! Form::number('ips', null, [
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
                        {!! Form::number('matematika', null, [
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