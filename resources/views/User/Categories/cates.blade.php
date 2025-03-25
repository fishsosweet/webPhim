@extends('User.main')
@section('header')
    @php
        $categories=$Categories
    @endphp
@endsection
@section('content')
    <div class="last-main-container" >
        <ul class="filter-container">
            <li class="filter-group">
                <span class="filter-label">Quốc gia</span>
                <select class="filter-select">
                    <option>Tất cả</option>
                    <option>Trung Quốc</option>
                    <option>Hàn Quốc</option>
                    <option>Nhật Bản</option>
                </select>
            </li>
            <li class="filter-group">
                <span class="filter-label">Thể loại</span>
                <select class="filter-select">
                    <option>Cổ Trang</option>
                    <option>Kiếm Hiệp</option>
                    <option>Huyền Huyễn</option>
                </select>
            </li>
            <li class="filter-group">
                <span class="filter-label">Sắp xếp</span>
                <select class="filter-select">
                    <option>Mới nhất</option>
                    <option>Cũ nhất</option>
                    <option>Xem nhiều</option>
                </select>
            </li>
        </ul>
        <h2 style="color: #ff7b00; font-size: 30px; font-weight: bold; margin-bottom: 10px;">{{$title}}</h2>
        <div class="section-divider" style="width: 100%; height: 2px; background-color: #ff7b00; margin-bottom: 15px;"></div>
        <div class="movie-list" style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
            @foreach($Phim as $phim)
                <a href="#" style="text-decoration: none; color: black;margin-bottom: 10px">
                    <div class="movie" style="width: 160px; height: 240px; background-color:#e38f51; padding: 0px; border-radius: 5px; position: relative; text-align: center;">

                        <img src="{{'/'.$phim->poster_url}}" style="width: 100%; height: 80%; border-radius: 5px 5px 0 0;">

                        <div class="play-button" style="width: 40px;height: 40px;font-size: 15px;">
                            <p style="position: relative;top: -25px">▶</p>
                        </div>
                        <div class="movie-info" style="position: relative;top:-20px">
                            <h5 class="truncate-2-lines" style="font-size: 12px">{{$phim->title}}</h5>
                            <span style="position: relative;top: -20px;font-size: 10px">{{$phim->release_year}} | {{$phim->duration}}p</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
@section('footer')
    @php
        $sliderFooter=$Sliders
    @endphp
@endsection
