@extends('layouts.index')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Rank Students</h1>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered tabel" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th scope="col">Rank</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Nilai Total</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($data as $item)
                          <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$item->nama}}</td>
                              <td>{{$item->nilai_total}}</td>
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

@push('style')
    <style>
        .table tbody tr:nth-child(1){
            background-color: gold;
        }
        .table tbody tr:nth-child(2){
            background-color: silver;
        }
        .table tbody tr:nth-child(3){
            background-color: chocolate;
        }
    </style>
@endpush