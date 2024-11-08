@extends('layout.app')
@section('breadcrumb')
    <ol class="breadcrumb my-0">
        <li class="breadcrumb-item"><a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active"><span>Dashboard</span>
        </li>
    </ol>
@endsection
@section('content')
    <div class="row g-4 mb-4">
        <div class="row g-4">
            <div class="col-12 col-sm-12 col-xl-8 col-xxl-9">
                <div class="card overflow-hidden">
                    <div class="card">
                        <div class="d-flex align-items-start row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary mb-3">Selamat Datang {{ auth()->user()->name }}</h5>
                                    <p class="mb-6">
                                        Silahkan mengakses menu yang ada di samping kiri.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-6">
                                    <img src="{{ asset('img/man-with-laptop.png') }}" height="175" class="scaleX-n1-rtl"
                                        alt="View Badge User">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-12 col-sm-12 col-xl-4 col-xxl-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="bg-danger text-white p-4 me-3">
                            <i class="fa-duotone fa-solid fa-users fa-xl"></i>
                        </div>
                        <div>
                            <div class="fs-6 fw-semibold text-danger">{{ $data->total_profile }}</div>
                            <div class="text-body-secondary text-uppercase fw-semibold small">Jumlah Pegawai
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
@endsection
