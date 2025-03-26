@extends('User.main')
@section('header')
    @php
        $categories=$Categories
    @endphp
@endsection
@section('content')

    <div class="container">
        <div class="flex-div" style="border-radius:10px;padding:0px 0px 10px;display: flex; align-items: flex-start;background-color: #495057">
            <div class="left" style="width: 70%;">
                <div class="mt-3 d-flex justify-content-center">
                    <iframe id="previewTrailer" class="rounded"
                            style="width: 950px; height: 550px; max-width: 100%;"
                            frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="left" style="width: 30%;">
                <div class="suggested-movies">
                    <div class="btn-group">
                        <span class="btn btn-warning" style="cursor: default;">Gợi ý cho bạn</span>
                    </div>

                    <div class="movie-list">
                        <!-- 10 Phim -->
                        <div class="movie-item">
                            <img src="link_anh_1.jpg" alt="Người Chơi Cờ">
                            <div class="movie-info">
                                <p class="movie-title">Người Chơi Cờ</p>
                                <p class="movie-views">0 lượt xem</p>
                            </div>
                        </div>

                        <div class="movie-item">
                            <img src="link_anh_2.jpg" alt="Ta Có Thể Giác Ngộ Vô Hạn">
                            <div class="movie-info">
                                <p class="movie-title">Ta Có Thể Giác Ngộ Vô Hạn</p>
                                <p class="movie-views">3 lượt xem</p>
                            </div>
                        </div>

                        <div class="movie-item">
                            <img src="link_anh_3.jpg" alt="Nautilus">
                            <div class="movie-info">
                                <p class="movie-title">Nautilus: Hai Vạn Dặm Dưới Đáy Biển</p>
                                <p class="movie-views">21 lượt xem <span class="rating">⭐ 2.5</span></p>
                            </div>
                        </div>

                        <div class="movie-item">
                            <img src="link_anh_4.jpg" alt="Người Hùng Yếu Đuối">
                            <div class="movie-info">
                                <p class="movie-title">Người Hùng Yếu Đuối</p>
                                <p class="movie-views">69 lượt xem</p>
                            </div>
                        </div>

                        <div class="movie-item">
                            <img src="link_anh_5.jpg" alt="Bà Mẹ Lừa Đảo">
                            <div class="movie-info">
                                <p class="movie-title">Bà Mẹ Lừa Đảo</p>
                                <p class="movie-views">25 lượt xem</p>
                            </div>
                        </div>

                        <div class="movie-item">
                            <img src="link_anh_6.jpg" alt="Cầu Thang">
                            <div class="movie-info">
                                <p class="movie-title">Cầu Thang</p>
                                <p class="movie-views">4 lượt xem</p>
                            </div>
                        </div>

                        <div class="movie-item">
                            <img src="link_anh_7.jpg" alt="Phim 7">
                            <div class="movie-info">
                                <p class="movie-title">Phim 7</p>
                                <p class="movie-views">10 lượt xem</p>
                            </div>
                        </div>

                        <div class="movie-item">
                            <img src="link_anh_8.jpg" alt="Phim 8">
                            <div class="movie-info">
                                <p class="movie-title">Phim 8</p>
                                <p class="movie-views">15 lượt xem</p>
                            </div>
                        </div>

                        <div class="movie-item">
                            <img src="link_anh_9.jpg" alt="Phim 9">
                            <div class="movie-info">
                                <p class="movie-title">Phim 9</p>
                                <p class="movie-views">7 lượt xem</p>
                            </div>
                        </div>

                        <div class="movie-item">
                            <img src="link_anh_10.jpg" alt="Phim 10">
                            <div class="movie-info">
                                <p class="movie-title">Phim 10</p>
                                <p class="movie-views">20 lượt xem</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="title" style="color: white;font-size: 30px">{{$Phim->title}}</div>
        <div class="tags">
            @foreach($Phim->category as $category)
                <span style="background-color:#ff7b00 ">{{ $category->name }}</span>
            @endforeach

        </div>

        <div class="comment-section">
            <h3 style="color:white ">Bình luận</h3>
            <textarea class="comment-box" placeholder="Viết bình luận..."></textarea>

            <input type="submit" value="Gửi" class="btn-submit">

            <div class="comment">
                <strong>Nguyễn Văn A:</strong>
                <p>Phim hay quá, mong ad up thêm nhiều phim kiểu này!</p>
            </div>
            <div class="comment">
                <strong>Trần Thị B:</strong>
                <p>Hóng phần tiếp theo nè!</p>
            </div>
        </div>
    </div>

    <script>
        function convertToEmbed(url) {
            let videoId = '';
            const youtubeRegex = /(?:youtu\.be\/|youtube\.com\/(?:.*v=|.*\/|embed\/|v\/|shorts\/|live\/))([\w-]{11})/;
            const match = url.match(youtubeRegex);

            if (match && match[1]) {
                videoId = match[1]; // Lấy video_id từ URL
                return `https://www.youtube.com/embed/${videoId}`;
            }
            return null;
        }

        let youtubeLink = "{{$Phim->video_url}}";
        let embedUrl = convertToEmbed(youtubeLink);

        if (embedUrl) {
            document.getElementById("previewTrailer").src = embedUrl;
        }
    </script>
@endsection
@section('footer')
    @php
        $sliderFooter=$Sliders
    @endphp
@endsection
