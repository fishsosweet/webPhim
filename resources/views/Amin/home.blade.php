
@extends('Amin.main')
@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Trang Quản Lý</h1>

        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Số Phim</h5>
                        <h2>{{$countMovies}}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Số Tài Khoản</h5>
                        <h2>{{$countUsers}}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">Số Tài Khoản VIP</h5>
                        <h2></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">Số Phim Đã Mua</h5>
                        <h2></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
