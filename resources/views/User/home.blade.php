@extends('User.main')
@section('content')
    <div class="TrangChu" style="position: relative;top: -15px">
        <div class="banner">
            <h1>Nhiều phim, nhiều hơn và nhiều hơn nữa</h1>
            <p>Starts at 70,000 đ. Cancel anytime.</p>
            <div class="email-box">
                <input type="email" placeholder="Tìm tên phim">
                <button>Tìm</button>
            </div>
        </div>
    </div>
    <h2 class="kieuchubu" style="font-size: 40px;text-align: center;position: relative;top:100px;left: -25px;z-index: 1000">THỂ LOẠI</h2>
    <div class="TrangChu2" style="position: relative; top: -20px;">


        <div class="movie-container" style="position: relative;left: 70px; font-family: 'Be Vietnam Pro', sans-serif;;">
            <div class="movie-group" id="group1">
                <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img src="{{asset($Cates[0]['thum'])}}"style="width: 99%;height: 90%">
                    <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[0]['name']}}</div>
                </div>
                <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img src="{{asset($Cates[1]['thum'])}}"style="width: 99%;height: 90%">
                    <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[1]['name']}}</div>
                </div>
                <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img src="{{asset($Cates[2]['thum'])}}"style="width: 99%;height: 90%">
                    <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[2]['name']}}</div>
                </div>
                <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img src="{{asset($Cates[3]['thum'])}}"style="width: 99%;height: 90%">
                    <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[3]['name']}}</div>
                </div>
            </div>
            <div class="movie-group" id="group2" style="display: none;">
                <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img src="{{asset($Cates[4]['thum'])}}"style="width: 99%;height: 90%">
                    <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[4]['name']}}</div>
                </div>
                <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img src="{{asset($Cates[5]['thum'])}}"style="width: 99%;height: 90%">
                    <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[5]['name']}}</div>
                </div>
                <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img src="{{asset($Cates[6]['thum'])}}"style="width: 99%;height: 90%">
                    <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[6]['name']}}</div>
                </div>
                <div class="movie" style="width: 250px;height: 350px;background-color: #ff7b00"><img src="{{asset($Cates[7]['thum'])}}"style="width: 99%;height: 90%">
                    <div class="kieuchu" style="color: black;font-size: 25px">{{$Cates[7]['name']}}</div>
                </div>

            </div>
        </div>
        <button id="nextBtn">▶</button>
        <button id="prevBtn" style="position: relative;left: -1400px">◀</button>
    </div>
    <div class="main-container">
        <div class="left-container">

            <div class="kho-phim">
                <h2 class="section-title"><a class="nav-link" href="#" style="text-decoration: none;color: #ff7b00 ">Phim mới ></a></h2>
                <div class="movie-slider">
                    @foreach($phimMoi as $phim)
                        <a href="#" style="text-decoration: none; color: black">
                        <div class="movie" style="width: 220px;height: 300px;background-color: #ff7b00">
                            <img src="{{$phim->poster_url}}" style="width: 99%;height: 80%">

                            <div class="movie-info" style="position: relative;top:-20px">
                                <h4 class="truncate-2-lines">{{$phim->title}}</h4>
                                <span style="position: relative;top: -20px">{{$phim->release_year}} | {{$phim->duration}}p</span>
                            </div>

                        </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="kho-phim">
                <h2 class="section-title"><a class="nav-link" href="#" style="text-decoration: none;color: #ff7b00 ">Phim kinh dị ></a></h2>
                <div class="movie-slider">
                    @foreach($phimKinhDi as $phim)
                        <a href="#" style="text-decoration: none; color: black">
                            <div class="movie" style="width: 220px;height: 300px;background-color: #ff7b00">
                                <img src="{{$phim->poster_url}}" style="width: 99%;height: 80%">

                                <div class="movie-info" style="position: relative;top:-20px">
                                    <h4 class="truncate-2-lines">{{$phim->title}}</h4>
                                    <span style="position: relative;top: -20px">{{$phim->release_year}} | {{$phim->duration}}p</span>
                                </div>

                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="kho-phim">
                <h2 class="section-title"><a class="nav-link" href="#" style="text-decoration: none;color: #ff7b00 ">Phim họoạt hình ></a></h2>
                <div class="movie-slider">
                    @foreach($phimHoatHinh as $phim)
                        <a href="#" style="text-decoration: none; color: black">
                            <div class="movie" style="width: 220px;height: 300px;background-color: #ff7b00">
                                <img src="{{$phim->poster_url}}" style="width: 99%;height: 80%">
                                <div class="movie-info" style="position: relative;top:-20px">
                                    <h4 class="truncate-2-lines">{{$phim->title}}</h4>
                                    <span style="position: relative;top: -20px">{{$phim->release_year}} | {{$phim->duration}}p</span>
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
                <div class="ranking-item">
                    <span>1</span>
                    <div>
                        <h4>Điên thì có sao</h4>
                        <span>2020 • 16 Tập</span>
                    </div>
                </div>
                <div class="ranking-item">
                    <span>2</span>
                    <div>
                        <h4>Cẩm Tú Vị Ương</h4>
                        <span>2016 • 54 Tập</span>
                    </div>
                </div>
                <div class="ranking-item">
                    <span>3</span>
                    <div>
                        <h4>Bí mật ngọt ngào</h4>
                        <span>2017 • 14 Tập</span>
                    </div>
                </div>
                <div class="ranking-item">
                    <span>4</span>
                    <div>
                        <h4>Bí mật của bạn học</h4>
                        <span>2024 • 20 Tập</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    @php
        $sliderFooter=$Sliders
    @endphp
@endsection
