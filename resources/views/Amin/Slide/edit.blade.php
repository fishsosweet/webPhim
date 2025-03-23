@extends('Amin.main')
@section('content')
    <div class="content" style="position: relative;left:-220px">
        <h1 class="mb-4">{{$title}}</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf <!-- Bảo vệ form khỏi CSRF attacks -->

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ten_slider" class="form-label">Tên slider</label>
                        <input type="text" class="form-control" id="tenslider" name="tenslider" value="{{$Slider->name}}">
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
                            <input type="datetime-local" class="form-control" name="updated_at" id="updated_at">
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="position: relative;left: 60px">
                    <div class="mb-3">
                        <label for="anhslider" class="form-label">Ảnh slider</label>
                        <input type="file" class="form-control" id="anh" name="anh" accept="image/*">
                        <div id="image_show">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sap_xep" class="form-label">Vị trí</label>
                        <input type="number" class="form-control" id="sapxep" name="sapxep" min="1" max="10" value="{{$Slider->sort}}">
                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 20px">Cập nhật slider</button>
        </form>
    </div>
@endsection
