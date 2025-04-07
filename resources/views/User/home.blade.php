@extends('User.main')
@section('content')
    <div class="TrangChu" style="position: relative;top: -15px">
        <div class="banner">
            <h1>Nhiều phim, nhiều hơn và nhiều hơn nữa</h1>
            <p>Đăng ký ngay tài khoản thành viên</p>
            <div class="email-box">
                <form method="POST">
                    @csrf
                <input type="text" placeholder="Tìm tên phim" name="search">
                <button type="submit">Tìm</button>
                </form>
            </div>
        </div>
    </div>
    <h2 class="kieuchubu"
        style="font-size: 40px;text-align: center;position: relative;top:100px;left: -25px;z-index: 1000">THỂ LOẠI</h2>
    <div class="TrangChu2" style="position: relative; top: -20px;">

        <div class="movie-container" style="position: relative;left: 70px; font-family: 'Be Vietnam Pro', sans-serif;;">
            <div class="movie-group" id="group1">
                <a style="text-decoration: none"
                   href="{{route('khophim-categories-get', ['id' => $Cates[0]['id'], 'name' => Str::slug($Cates[0]['name'])])}}">
                    <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img
                            src="{{asset($Cates[0]['thum'])}}" style="width: 99%;height: 90%">
                        <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[0]['name']}}</div>
                    </div>
                </a>
                <a style="text-decoration: none"
                   href="{{route('khophim-categories-get', ['id' => $Cates[1]['id'], 'name' => Str::slug($Cates[1]['name'])])}}">
                    <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img
                            src="{{asset($Cates[1]['thum'])}}" style="width: 99%;height: 90%">
                        <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[1]['name']}}</div>
                    </div>
                </a>
                <a style="text-decoration: none"
                   href="{{route('khophim-categories-get', ['id' => $Cates[2]['id'], 'name' => Str::slug($Cates[2]['name'])])}}">
                    <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img
                            src="{{asset($Cates[2]['thum'])}}" style="width: 99%;height: 90%">
                        <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[2]['name']}}</div>
                    </div>
                </a>
                <a style="text-decoration: none"
                   href="{{route('khophim-categories-get', ['id' => $Cates[3]['id'], 'name' => Str::slug($Cates[3]['name'])])}}">
                    <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img
                            src="{{asset($Cates[3]['thum'])}}" style="width: 99%;height: 90%">
                        <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[3]['name']}}</div>
                    </div>
                </a>
            </div>
            <div class="movie-group" id="group2" style="display: none;">
                <a style="text-decoration: none"
                   href="{{route('khophim-categories-get', ['id' => $Cates[4]['id'], 'name' => Str::slug($Cates[4]['name'])])}}">
                    <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img
                            src="{{asset($Cates[4]['thum'])}}" style="width: 99%;height: 90%">
                        <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[4]['name']}}</div>
                    </div>
                </a>
                <a style="text-decoration: none"
                   href="{{route('khophim-categories-get', ['id' =>$Cates[5]['id'], 'name' => Str::slug($Cates[5]['name'])])}}">
                    <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img
                            src="{{asset($Cates[5]['thum'])}}" style="width: 99%;height: 90%">
                        <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[5]['name']}}</div>
                    </div>
                </a>
                <a style="text-decoration: none"
                   href="{{route('khophim-categories-get', ['id' => $Cates[6]['id'], 'name' => Str::slug($Cates[6]['name'])])}}">
                    <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img
                            src="{{asset($Cates[6]['thum'])}}" style="width: 99%;height: 90%">
                        <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[6]['name']}}</div>
                    </div>
                </a>
                <a style="text-decoration: none"
                   href="{{route('khophim-categories-get', ['id' => $Cates[7]['id'], 'name' => Str::slug($Cates[7]['name'])])}}">
                    <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img
                            src="{{asset($Cates[7]['thum'])}}" style="width: 99%;height: 90%">
                        <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[7]['name']}}</div>
                    </div>
                </a>
            </div>
        </div>
        <button id="nextBtn">▶</button>
        <button id="prevBtn" style="position: relative;left: -1400px">◀</button>
    </div>
    <div class="main-container">
        <div class="left-container">

            <div class="kho-phim">
                <h2 class="section-title"><a class="nav-link" href="#" style="text-decoration: none;color: #ff7b00 ">Phim
                        mới ></a></h2>
                <div class="movie-slider">
                    @foreach($phimMoi as $phim)
                        @if(auth('web')->check())
                            <a href="{{$phim->is_vip && !auth('web')->user()->vip_status ? route('vip-get') : route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                        @else
                            <a href="{{route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                               @endif
                               style="text-decoration: none; color: black">
                                <div class="movie"
                                     style="width: 220px; height: 300px; background-color: #e38f51; padding: 0px;">
                                    @if($phim->is_vip)
                                        <div class="vip-banner">VIP</div>
                                    @endif
                                    <img src="{{$phim->poster_url}}" style="width: 100%;height: 80%;">
                                    <div class="play-button">
                                        ▶
                                    </div>
                                    <div class="movie-info" style="position: relative;top:-20px">
                                        <h5 class="truncate-2-lines">{{$phim->title}}</h5>
                                        <span style="position: relative;top: -20px;color: black;">{{$phim->release_year}} | {{$phim->duration}}p</span>
                                    </div>

                                </div>
                            </a>

                            @endforeach
                </div>
            </div>

            <div class="kho-phim">
                <h2 class="section-title"><a class="nav-link" href="#" style="text-decoration: none;color: #ff7b00 ">Phim
                        kinh dị ></a></h2>
                <div class="movie-slider">
                    @foreach($phimKinhDi as $phim)
                        @if(auth('web')->check())
                            <a href="{{$phim->is_vip && !auth('web')->user()->vip_status ? route('vip-get') : route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                        @else
                            <a href="{{route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                               @endif
                               style="text-decoration: none; color: black">
                                <div class="movie"
                                     style="width: 220px; height: 300px; background-color: #e38f51; padding: 0px;">
                                    @if($phim->is_vip)
                                        <div class="vip-banner">VIP</div>
                                    @endif
                                    <img src="{{$phim->poster_url}}" style="width: 100%;height: 80%;">
                                    <div class="play-button">
                                        ▶
                                    </div>
                                    <div class="movie-info" style="position: relative;top:-20px">
                                        <h5 class="truncate-2-lines">{{$phim->title}}</h5>
                                        <span style="position: relative;top: -20px;color: black;">{{$phim->release_year}} | {{$phim->duration}}p</span>
                                    </div>

                                </div>
                            </a>
                            @endforeach
                </div>
            </div>

            <div class="kho-phim">
                <h2 class="section-title"><a class="nav-link" href="#" style="text-decoration: none;color: #ff7b00 ">Phim
                        hoạt hình ></a></h2>
                <div class="movie-slider">
                    @foreach($phimHoatHinh as $phim)
                        @if(auth('web')->check())
                            <a href="{{$phim->is_vip && !auth('web')->user()->vip_status ? route('vip-get') : route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                        @else
                            <a href="{{route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                               @endif
                               style="text-decoration: none; color: black">
                                <div class="movie"
                                     style="width: 220px; height: 300px; background-color: #e38f51; padding: 0px;">
                                    @if($phim->is_vip)
                                        <div class="vip-banner">VIP</div>
                                    @endif
                                    <img src="{{$phim->poster_url}}" style="width: 100%;height: 80%;">
                                    <div class="play-button">
                                        ▶
                                    </div>
                                    <div class="movie-info" style="position: relative;top:-20px">
                                        <h5 class="truncate-2-lines">{{$phim->title}}</h5>
                                        <span style="position: relative;top: -20px;color: black;">{{$phim->release_year}} | {{$phim->duration}}p</span>
                                    </div>

                                </div>
                            </a>
                            @endforeach
                </div>
            </div>

        </div>

        <div class="ranking">
            <h2 class="section-title">Xem nhiều nhất</h2>
            <div class="ranking-list">
                @php
                    $i=0;
                @endphp
                @foreach($view as $phim)
                    @if(auth('web')->check())
                        <a href="{{$phim->is_vip && !auth('web')->user()->vip_status ? route('vip-get') : route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                           style="text-decoration: none">
                            @else
                                <a href="{{route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                                   style="text-decoration: none">
                                    @endif
                                    <div class="ranking-item">
                                        @if($phim->is_vip)
                                            <span>{{++$i}} <br>VIP</span>
                                        @else
                                            <span>{{++$i}}</span>
                                        @endif
                                        <img src="{{asset($phim->poster_url)}}" style="width: 80px;height: 90px">
                                        <div>
                                            <h4 class="movie-title-home"
                                                style="position: relative;top: -20px;left: -110px">{{$phim->title}}</h4>

                                            <span class="movie-info-home" style="position: relative;top: -10px">{{$phim->release_year}} | {{$phim->duration}}p - {{$phim->views}} lượt xem</span>


                                        </div>
                                    </div>
                                </a>
                        @endforeach
            </div>
        </div>
    </div>
    <div class="last-main-container">
        <h2 style="color: #ff7b00; font-size: 24px; font-weight: bold; margin-bottom: 10px;">GỢI Ý</h2>
        <div class="section-divider"
             style="width: 100%; height: 2px; background-color: #ff7b00; margin-bottom: 15px;"></div>

        <div class="movie-list-home" style="margin:5px;display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;">
            @foreach($randomPhim as $phim)
                @if(auth('web')->check())
                    <a href="{{$phim->is_vip && !auth('web')->user()->vip_status ? route('vip-get') : route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                       style="text-decoration: none;color: black">
                @else
                    <a href="{{route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                       style="text-decoration: none; color: black">
                        @endif
                        <div class="movie"
                             style="width: 160px; height: 240px; background-color:#e38f51; padding: 0px; border-radius: 5px; position: relative; text-align: center;margin: 10px">
                            @if($phim->is_vip)
                                <div class="vip-banner">VIP</div>
                            @endif
                            <img src="{{$phim->poster_url}}"
                                 style="width: 100%; height: 80%; border-radius: 5px 5px 0 0;">

                            <div class="play-button" style="width: 40px;height: 40px;font-size: 15px;">
                                <p style="position: relative;top: -25px">▶</p>
                            </div>
                            <div class="movie-info" style="position: relative;top:-20px">
                                <h5 class="truncate-2-lines" style="font-size: 12px">{{$phim->title}}</h5>
                                <span style="position: relative;top: -20px;font-size: 10px;color: black;">{{$phim->release_year}} | {{$phim->duration}}p</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
        </div>
    </div>
    <script>
        document.getElementById("nextBtn").addEventListener("click", function () {
            let group1 = document.getElementById("group1");
            let group2 = document.getElementById("group2");

            group1.style.display = "none";
            group2.style.display = "flex";
        });

        document.getElementById("prevBtn").addEventListener("click", function () {
            let group1 = document.getElementById("group1");
            let group2 = document.getElementById("group2");

            group1.style.display = "flex";
            group2.style.display = "none";
        });

    </script>
@endsection

