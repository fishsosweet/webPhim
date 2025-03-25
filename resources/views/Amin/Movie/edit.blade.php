@extends('Amin.main')
@section('content')
    <div class="content" style="position: relative;left:-220px">
        <h1 class="mb-4">{{$title}}</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf <!-- Bảo vệ form khỏi CSRF attacks -->

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ten_phim" class="form-label">Tên phim</label>
                        <input type="text" class="form-control" id="tenphim" name="tenphim" value="{{$Movie->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="mo_ta" class="form-label">Mô tả</label>

                        <textarea class="form-control" name="mota" id="mota" rows="3" placeholder="Enter content">{{$Movie->description}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="namxuatban" class="form-label">Chọn năm xuất bản:</label>
                            <input type="number" id="namxuatban" name="namxuatban" class="form-control" min="1900" max="2100" value="{{$Movie->release_year}}">
                        </div>

                        <div class="col-md-6">
                            <label for="thoiluong" class="form-label">Thời lượng phim:</label>
                            <div class="input-group">
                                <input type="number" id="thoiluong" name="thoiluong" class="form-control" min="30" max="500" value="{{$Movie->duration}}">
                                <span class="input-group-text">phút</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-4">
                            <label class="form-label">Kích Hoạt</label>
                            <div class="custom-control custom-radio" style="position: relative;top: -3px">
                                <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                                       checked="">
                                <label for="active" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio" style="position: relative;top: -3px">
                                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                                <label for="no_active" class="custom-control-label">Không</label>
                            </div>
                            <div class="mb-3" style="position: relative;top: 27px">
                                <label for="quocgia" class="form-label">Quốc gia:</label>
                                <select id="quocgia" name="quocgia" class="form-select">
                                    <option value="Việt Nam">Việt Nam</option>
                                    <option value="Hàn Quốc">Hàn Quốc</option>
                                    <option value="Nhật Bản">Nhật Bản</option>
                                    <option value="Mỹ">Mỹ</option>
                                    <option value="Trung Quốc">Trung Quốc</option>
                                    <option value="Thái Lan">Thái Lan</option>
                                    <option value="Pháp">Pháp</option>
                                    <option value="Ấn Độ">Ấn Độ</option>
                                    <option value="Anh">Anh</option>
                                    <option value="Đức">Đức</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3" style="position: relative;top: 10px">
                            <label for="created_at" class="form-label">Ngày cập nhật</label>
                            <input type="datetime-local" class="form-control" name="updated_at" id="updated_at">
                        </div>

                        <div class="mb-3" style="position: relative;top: 10px">
                            <label for="lua_tuoi" class="form-label">Chọn độ tuổi xem phim:</label>
                            <select id="luatuoi" name="luatuoi" class="form-select">
                                <option value="P">P (Mọi lứa tuổi)</option>
                                <option value="13+">13+</option>
                                <option value="16+">16+</option>
                                <option value="18+">18+</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-6" style="position: relative;left: 60px">
                    <div class="mb-3">
                        <label for="anh" class="form-label">Ảnh bìa</label>
                        <input type="file" class="form-control" id="anh" name="anh" accept="image/*">
                        <div id="image_show">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="theloai" class="form-label fw-bold">Chọn thể loại phim:</label>
                        <select id="theloai" name="theloai[]" class="form-select" multiple>
                            @foreach($Catogories as $catogories)
                                <option value="{{$catogories->id}}">{{$catogories->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="trailer1" class="form-label">Nhập link trailer:</label>
                        <input type="text" class="form-control" id="trailer1" name="trailer" placeholder="Dán link trailer ở đây..." value="{{$Movie->trailer_url}}">
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <iframe id="previewTrailer1" class="rounded d-none" style="max-width: 300px; width: 100%; height: 180px;" frameborder="0" allowfullscreen></iframe>
                    </div>

                    <div class="mb-3">
                        <label for="trailer2" class="form-label">Nhập link phim:</label>
                        <input type="text" class="form-control" id="trailer2" name="phim" placeholder="Dán link video ở đây..." value="{{$Movie->video_url}}">
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <iframe id="previewTrailer2" class="rounded d-none" style="max-width: 300px; width: 100%; height: 180px;" frameborder="0" allowfullscreen></iframe>
                    </div>


                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 20px">Cập nhật phim</button>
        </form>
    </div>
@endsection
