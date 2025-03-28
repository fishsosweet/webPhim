@extends('User.main')
@section('content')

    <div class="last-main-container">
        <ul class="filter-container">
            <li class="filter-group">
                <span class="filter-label">Quốc gia</span>
                <select class="filter-select" id="countryFilter" name="country">
                    <option value="none">Chọn Quốc Gia</option>
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
            </li>
            <li class="filter-group">
                <span class="filter-label">Thể loại</span>
                <select class="filter-select" id="categoriesFilter" name="country">
                    <option value="none">Chọn thể loại</option>
                    @foreach($Categories as $cates)
                        <option value="{{$cates->id}}">{{$cates->name}}</option>
                    @endforeach
                </select>
            </li>
            <li class="filter-group">
                <span class="filter-label">Sắp xếp</span>
                <select class="filter-select" id="timeFilter" name="country">
                    <option value="none">Chọn thời gian</option>
                    <option value="latest">Mới nhất</option>
                    <option value="oldest">Cũ nhất</option>
                    <option value="most_viewed">Xem nhiều</option>
                </select>
            </li>
        </ul>
        <h2 style="color: #ff7b00; font-size: 30px; font-weight: bold; margin-bottom: 10px;">Phim mới</h2>
        <div class="section-divider"
             style="width: 100%; height: 2px; background-color: #ff7b00; margin-bottom: 15px;"></div>
        <div class="movie-list" id="original-movie-list" style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;"
             >
            @foreach($Phim as $phim)
                <a href="{{ route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                   style="text-decoration: none; color: black;margin-bottom: 10px">
                    <div class="movie"
                         style="width: 160px; height: 240px; background-color:#e38f51; padding: 0px; border-radius: 5px; position: relative; text-align: center;">
                        <img src="{{'/'.$phim->poster_url}}"
                             style="width: 100%; height: 80%; border-radius: 5px 5px 0 0;">
                        <div class="play-button" style="width: 40px;height: 40px;font-size: 15px;">
                            <p style="position: relative;top: -25px">▶</p>
                        </div>
                        <div class="movie-info" style="position: relative;top:-20px">
                            <h5 class="truncate-2-lines" style="font-size: 12px">{{$phim->title}}</h5>
                            <span style="position: relative;top: -20px;font-size: 10px;color: black">{{$phim->release_year}} | {{$phim->duration}}p</span>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <div  class="movie-list" id="filtered-movie-list"
              style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
            @include('User.Categories.movie_list')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.filter-select').on('change', function () {
                let country = $('#countryFilter').val();
                let category = $('#categoriesFilter').val();
                let sort = $('#timeFilter').val();
                $.ajax({
                    url: "{{ route('movies.filter') }}",
                    method: "GET",
                    data: { country: country, category: category, sort: sort },
                    dataType: "json",
                    beforeSend: function () {
                        $('#original-movie-list').hide();
                    },
                    success: function (response) {
                        console.log("✅ Dữ liệu nhận được:", response);
                        $('#filtered-movie-list').html(response.html);
                    },
                    error: function (xhr, status, error) {
                        console.error("❌ Lỗi:", xhr.responseText);
                        alert('Lỗi khi tải dữ liệu.');
                        $('#original-movie-list').show();
                    }
                });
            });
        });
    </script>
@endsection

