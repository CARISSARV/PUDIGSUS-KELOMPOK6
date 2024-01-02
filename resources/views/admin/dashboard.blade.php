@extends('admin.master_admin')
@section('content')
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Dashboard</h3>
            <h6 class="font-weight-normal mb-0">Perpustakaan Digital Khusus</h6>
        </div>
        
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-people mt-auto">
            <img src="{{asset('asset/images/d_book.jpg')}}" alt="people">
            <div class="weather-info">
            <div class="d-flex">
                <div>
                </div>
                <div class="ml-2">
                <h4 class="location font-weight-normal" style="color:white">Pekanbaru</h4>
                <h6 class="font-weight-normal" style="color:white">Riau</h6>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
        <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
            <div class="card-body">
                <p class="mb-4">Total Buku</p>
                <p class="fs-30 mb-2">2</p>
                <p>Periode Bulan</p>
            </div>
            </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
            <div class="card-body">
                <p class="mb-4">Kategori Buku</p>
                <p class="fs-30 mb-2">4</p>
                <p>All</p>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
            <div class="card-body">
                <p class="mb-4">Buku Akademik</p>
                <p class="fs-30 mb-2">1</p>
                <p>All</p>
            </div>
            </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
            <div class="card-body">
                <p class="mb-4">Buku Non Akademik</p>
                <p class="fs-30 mb-2">1</p>
                <p>All</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@stop