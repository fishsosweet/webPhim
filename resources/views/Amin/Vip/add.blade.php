@extends('Amin.main')
@section('content')
    <div class="content" style="position: relative;left:-220px">
        <h1 class="mb-4">{{$title}}</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf <!-- Bảo vệ form khỏi CSRF attacks -->

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ten_vip" class="form-label">Tên gói VIP</label>
                        <input type="text" class="form-control" id="tenvip" name="tenvip" value="{{old('tenvip')}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kích Hoạt</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                        <div class="mb-3" style="position: relative;top: 10px">
                            <label for="created_at" class="form-label">Ngày tạo</label>
                            <input type="datetime-local" class="form-control" name="created_at" id="created_at">
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="position: relative;left: 60px">
                    <div class="mb-3" style="position: relative;top: 10px;width: 250px">
                        <label for="plan" class="form-label">Thời hạn:</label>
                        <select id="plan" name="plan" class="form-select">
                            <option value="1">1 tháng</option>
                            <option value="3">3 tháng</option>
                            <option value="6">6 tháng</option>
                            <option value="9">9 tháng</option>
                            <option value="12">12 tháng</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Giá:</label>
                        <div class="input-group">
                            <input type="number" id="price" name="price" class="form-control" min="1000"
                                    value="0">
                            <span class="input-group-text">VNĐ</span>
                        </div>
                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 20px">Thêm gói VIP</button>
        </form>
    </div>
@endsection
