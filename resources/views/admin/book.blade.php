@extends('admin.master_admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Buku</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial -->
        <div class="row" style="margin-top:-30px">
           <a type="button" class="btn btn-info mb-2 ml-3" data-toggle="modal" data-target="#modalTambah">Tambah Buku</a>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Buku</h4>
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
                                    <th>Judul</th>
                                    <th>Nama Pengarang</th>
                                    <th>Tahun Terbit</th>
                                    <th>Deskripsi</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->judul }}</td>
                                    <td>{{ $row->pengarang }}</td>
                                    <td>{{ $row->tahun_terbit }}</td>
                                    <td>{{ $row->deskripsi }}</td>
                                    <td>{{ $row->jenis }}</td>
                                    <td>@method('DELETE')
                                    <a href="{{ url('/hapusBuku') . '/' . $row->id }}"  class="btn btn-danger btn-rounded btn-sm">DELETE</a>
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
                        <h4 class="card-title" id="exampleModalLongTitle">Tambah Buku</h4>
                        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Judul Buku" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" placeholder="Pengarang" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Tahun Terbit</label>
                            <input type="date" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row" >Deskripsi</label>
                            <textarea id="story" name="deskripsi" rows="5" cols="33" class="form-control">
                            Deskripsi...
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Jenis</label>
                            <select name="jenis" class="form-control">
                                <option value="pendidikan">Penidikan</option>
                                <option value="fiksi">Fiksi</option>
                                <option value="nonfiksi">Non Fiksi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Audio</label>
                            <input type="file" class="form-control" name="audio" accept="audio/*" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >Cover Buku</label>
                            <input type="file" class="form-control" name="cover" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" >File</label>
                            <input type="file" class="form-control" name="file" accept=".pdf" required>
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