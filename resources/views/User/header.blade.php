<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>KhoPhim</title>
    <link rel="stylesheet" href="{{ asset('layout/home.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/script.js') }}"></script>
</head>
<body>

<div class="nav-container" style="position: fixed;">
    <div class="logo" ><a href="{{route('homekhophim-get')}}" style="color:  #ff7b00  ;text-decoration: none">KHOPHIM</a></div>
    <div class="header">
        <ul class="menu">
            <li><a href="{{route('homekhophim-get')}}" STYLE="font-size: 18px">TRANG CHỦ</a></li>
            <li><a href="{{route('khophim-newmovies-get')}}" style="text-decoration: none">PHIM MỚI</a></li>
            <li>THỂ LOẠI ▼
                <ul class="submenu">
                    @foreach($Categories as $cates)
                        <li><a href="{{route('khophim-categories-get', ['id' => $cates->id, 'name' => Str::slug($cates->name)])}}">{{$cates->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li>QUỐC GIA ▼
                <ul class="submenu">
                    <li><a href="{{route('khophim-country-get',['country' => 'Việt Nam'])}}" style="text-decoration: none">Việt Nam</a></li>
                    <li><a href="{{route('khophim-country-get',['country' => 'Hàn Quốc'])}}" style="text-decoration: none">Hàn Quốc</a></li>
                    <li><a href="{{route('khophim-country-get',['country' => 'Nhật Bản'])}}" style="text-decoration: none">Nhật Bản</a></li>
                    <li><a href="{{route('khophim-country-get',['country' => 'Mỹ'])}}" style="text-decoration: none">Mỹ</a></li>
                    <li><a href="{{route('khophim-country-get',['country' => 'Trung Quốc'])}}" style="text-decoration: none">Trung Quốc</a></li>
                    <li><a href="{{route('khophim-country-get',['country' => 'Thái Lan'])}}" style="text-decoration: none">Thái Lan</a></li>
                    <li><a href="{{route('khophim-country-get',['country' => 'Pháp'])}}" style="text-decoration: none">Pháp</a></li>
                    <li><a href="{{route('khophim-country-get',['country' => 'Ấn Độ'])}}" style="text-decoration: none">Ấn Độ</a></li>
                    <li><a href="{{route('khophim-country-get',['country' => 'Anh'])}}" style="text-decoration: none">Anh</a></li>
                    <li><a href="{{route('khophim-country-get',['country' => 'Đức'])}}" style="text-decoration: none">Đức</a></li>
                </ul>
            </li>
            <li>ĐỘ TUỔI
                <ul class="submenu">
                    <li><a href="{{route('khophim-age-get',['age' => 'P'])}}" style="text-decoration: none">Mọi lứa tuổi</a></li>
                    <li><a href="{{route('khophim-age-get',['age' => '13+'])}}" style="text-decoration: none">13+</a></li>
                    <li><a href="{{route('khophim-age-get',['age' => '16+'])}}" style="text-decoration: none">16+</a></li>
                    <li><a href="{{route('khophim-age-get',['age' => '18+'])}}" style="text-decoration: none">18+</a></li>
                </ul>
            </li>

            <li>LIÊN HỆ</li>
        </ul>

    </div>
    @if(Auth::guard('web')->check())
        <div class="user-dropdown">
            <img src="{{asset('/imgs/avt.jpg') }}" alt="Avatar" class="avatar">
            <div class="dropdown-content">
                <h4 style="color: white;position: relative;left: 10px">{{ Auth::user()->name }}</h4>
                <a href="{{route('logout-khophim-get')}}">Đăng xuất</a>
            </div>
        </div>
    @else
        <a href="{{route('login-khophim-get')}}" class="sign-in" >Sign In</a>
    @endif

</div>

