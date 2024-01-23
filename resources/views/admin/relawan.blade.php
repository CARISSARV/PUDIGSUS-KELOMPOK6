@extends('admin.master_admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Nama</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial -->
        <div class="row" style="margin-top:-30px">
           <a type="button" class="btn btn-info mb-2 ml-3" data-toggle="modal" data-target="#modalTambah">Tambah Relawan</a>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Nama</h4>
                             @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger mt-3" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                <th>No</th>
                                    <th>Nama</th>
                                    <th>Generasi</th>
                                    <th>Program Studi</th>
                                    <th>Foto</th>
                                </tr>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->generasi }}</td>
                                    <td>{{ $row->program_studi }}</td>
                                    <td>{{ $row->foto }}</td>
                                    <td>@method('DELETE')
                                    <a href="{{ url('/hapusRelawan') . '/' . $row->id }}"  class="btn btn-danger btn-rounded btn-sm">DELETE</a>
                                    <a href="{{ url('/editRelawan') . '/' . $row->id }}"  class="btn btn-warning btn-rounded btn-sm">EDIT</a>
                                    
                                    <form action="{{ route('relawan.destroy', $row->id_relawan) }}" method="post">
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Mutasi -->
<div class="modal fade" id="modalTambah" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="exampleModalLongTitle">Tambah Relawan</h4>
                        <form action="{{ route('relawan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Generasi</label>
                            <input type="text" class="form-control" name="generasi" placeholder="Generasi" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Program Studi</label>
                            <input type="text" class="form-control" name="program_studi" placeholder="Program Studi" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Foto</label>
                            <input type="file" class="form-control" name="foto" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-info mr-2">Simpan</button>
                        <a href="" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop