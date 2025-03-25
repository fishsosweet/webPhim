<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>KhoPhim</title>
    <link rel="stylesheet" href="{{ asset('layout/home.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
</head>
<body>

<div class="nav-container" style="position: fixed;">
    <div class="logo" ><a href="{{route('homekhophim-get')}}" style="color:  #ff7b00  ;text-decoration: none">KHOPHIM</a></div>
    <div class="header">
        <ul class="menu">
            <li><a href="{{route('homekhophim-get')}}" STYLE="font-size: 18px">TRANG CHỦ</a></li>
            <li>PHIM MỚI</li>
            <li>THỂ LOẠI
                <ul class="submenu">
                    @foreach($categories as $cates)
                        <li><a href="{{ route('khophim-categories-get', ['id' => $cates->id, 'name' => Str::slug($cates->name)])}}">{{$cates->name}}</a></li>
                    @endforeach

                </ul>
            </li>
            <li>QUỐC GIA
                <ul class="submenu">
                    <li>Việt Nam</li>
                    <li>Hàn Quốc</li>
                    <li>Nhật Bản</li>
                    <li>Mỹ</li>
                    <li>Trung Quốc</li>
                    <li>Thái Lan</li>
                    <li>Pháp</li>
                    <li>Ấn Độ</li>
                    <li>Anh</li>
                    <li>Đức</li>
                </ul>
            </li>
            <li>ĐỘ TUỔI
                <ul class="submenu">
                    <li>Mọi lứa tuổi</li>
                    <li>13+</li>
                    <li>16+</li>
                    <li>18+</li>
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

