@extends('layouts.index')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Students</h1>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($data as $item)
                          <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$item->nama}}</td>
                              <td>
                                  <img src="{{url($item->foto)}}" alt="foto" style="height: 50px; width: 50px;">
                              </td>
                              <td>{{$item->alamat}}</td>
                              <td>{{$item->kelas}}</td>
                              <td>
                                  <a href="#mymodal"
                                  data-remote="{{ route('student.show', $item->id) }}"
                                  data-toggle="modal"
                                  data-target="#mymodal"
                                  data-title="Detail Score {{ $item->nama }}" 
                                  style="display: inline;" class="btn btn-info btn-sm">
                                    <i class="fas fa-ellipsis-h"></i>
                                </a>
                                <a href="{{ route('student.edit', $item->id) }}" class="btn btn-warning btn-sm " style="display: inline;  margin-left: 5px;margin-right: 5px;">
                                    <i class="fas fa-pen"></i>
                                  </a>
                                    {!! Form::open(['route' => ['student.destroy',$item->id],'method'=>'delete',
                                    'class'=>'d-inline']) !!}
                                    <button type="submit" class="btn btn-danger " >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                          @empty
                              <tr>
                                  <td colspan="6" style="text-align: center;">Data Tidak Ada</td>
                              </tr>
                          @endforelse
                      </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


    
    
  </tbody>