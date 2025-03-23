@extends('User.main')
@section('content')
    <div class="TrangChu" style="position: relative;top: -47px">
        <div class="banner">
            <h1>Nhiều phim, nhiều hơn và nhiều hơn nữa</h1>
            <p>Starts at 70,000 đ. Cancel anytime.</p>
            <div class="email-box">
                <input type="email" placeholder="Tìm tên phim">
                <button>Tìm</button>
            </div>
        </div>
    </div>

    <div class="TrangChu2" style="position: relative;top: -20px ">
        <div>
            <h2 class="kieuchubu" style="position: relative; left: 660px; top: -300px">THỂ LOẠI </h2>
        </div>
        <div class="movie-container" style="position: relative;left: -10px">
            <div class="movie-group" id="group1">
                <div class="movie"><img src="images/phim5.jpg">
                    <div class="kieuchu">Mắc Biết</div>
                </div>
                <div class="movie"><img src="images/phim6.jpg">
                    <div class="kieuchu">Trạng Quỳnh</div>
                </div>
                <div class="movie"><img src="images/phim3.jpg">
                    <div class="kieuchu">Bố Già</div>
                </div>
                <div class="movie"><img src="images/phim4.jpg">
                    <div class="kieuchu">Ironman</div>
                </div>
            </div>
            <div class="movie-group" id="group2" style="display: none;">
                <div class="movie"><img src="images/phim7.jpg">
                    <div class="kieuchu">Người đẹp và quái vật</div>
                </div>
                <div class="movie"><img src="images/phim11.jpg">
                    <div class="kieuchu">Trận chiến cuối</div>
                </div>
                <div class="movie"><img src="images/phim12.jpg">
                    <div class="kieuchu">Herry Potter</div>
                </div>
                <div class="movie"><img src="images/phim10.jpg">
                    <div class="kieuchu">Cướp biển vùng Caribe</div>
                </div>

            </div>
        </div>
        <button id="nextBtn">▶</button>
        <button id="prevBtn" style="position: relative;left: -1400px">◀</button>
    </div>
    <div class="main-container">
        <div class="left-container">
            <div class="kho-phim">
                <h2 class="section-title"><a class="nav-link" href="#" style="text-decoration: none;color: #ff7b00 ">Phim hành động</a></h2>
                <div class="movie-slider">
                    <div class="movie">
                        <img src="images/phim5.jpg">
                        <div class="movie-info">
                            <h3>Sói 200%</h3>
                            <span>2024 • 98 phút</span>
                        </div>
                    </div>
                    <div class="movie">
                        <img src="images/phim6.jpg">
                        <div class="movie-info">
                            <h3>Nữ Tu Bóng Tối</h3>
                            <span>2025 • 115 phút</span>
                        </div>
                    </div>
                    <div class="movie">
                        <img src="images/phim3.jpg">
                        <div class="movie-info">
                            <h3>Yêu Là Đau</h3>
                            <span>2025 • 83 phút</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kho-phim">
                <h2 class="section-title"><a class="nav-link" href="#" style="text-decoration: none;color: #ff7b00 ">Phim khoa học</a></h2>
                <div class="movie-slider">
                    <div class="movie">
                        <img src="images/phim5.jpg">
                        <div class="movie-info">
                            <h3>Sói 200%</h3>
                            <span>2024 • 98 phút</span>
                        </div>
                    </div>
                    <div class="movie">
                        <img src="images/phim6.jpg">
                        <div class="movie-info">
                            <h3>Nữ Tu Bóng Tối</h3>
                            <span>2025 • 115 phút</span>
                        </div>
                    </div>
                    <div class="movie">
                        <img src="images/phim3.jpg">
                        <div class="movie-info">
                            <h3>Yêu Là Đau</h3>
                            <span>2025 • 83 phút</span>
                        </div>
                    </div>
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
