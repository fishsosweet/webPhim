@extends('Amin.main')
@section('content')
    <div class="content" style="position: relative;left:-220px">
        <h1 class="mb-4">{{$title}}</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf <!-- Bảo vệ form khỏi CSRF attacks -->

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ten_danh_muc" class="form-label">Tên thể loại</label>
                        <input type="text" class="form-control" id="tentheloai" name="tentheloai" value="{{$Categories->name}}">
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
                            <label for="created_at" class="form-label">Ngày cập nhật</label>
                            <input type="datetime-local" class="form-control" name="created_at" id="created_at">
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="position: relative;left: 60px">
                    <div class="mb-3">
                        <label for="anh" class="form-label">Ảnh bìa</label>
                        <input type="file" class="form-control" id="anh" name="anh" accept="image/*">


                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 20px">Cập nhật thể loại</button>
        </form>
    </div>
@endsection
