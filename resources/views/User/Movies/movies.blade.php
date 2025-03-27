@extends('User.main')
@section('header')
    @php
        $categories=$Categories
    @endphp
@endsection
@section('content')

    <div class="container">
        <div class="flex-div"
             style="border-radius:10px;padding:0px 0px 10px;display: flex; align-items: flex-start;background-color: #454545">
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
                        <span class="btn btn-warning"
                              style="cursor: default;background-color: #ff7b00">Gợi ý cho bạn</span>
                    </div>

                    <div class="movie-list">
                        @foreach($randMovies as $phim)
                            <a href="{{ route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"style="text-decoration: none">
                                <div class="movie-item">
                                    <img src="{{asset($phim->poster_url)}}" alt="{{asset($phim->poster_url)}}">
                                    <div class="movie-info">
                                        <p class="movie-title">{{$phim->title}}</p>
                                        <p class="movie-views">0 lượt xem</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div class="title" style="color: white;font-size: 30px">{{$Phim->title}}</div>
        <div class="tags">
            @foreach($Phim->category as $category)
                <span style="background-color:#ff7b00 ">{{ $category->name }}</span>
            @endforeach
            <p id="moTa" style="color: gainsboro; max-height: 60px; overflow: hidden; transition: max-height 0.3s;">
                Nội dung: {{ $Phim->description }}</p>
            <button id="xemThem" style="background: none; border: none; color: white; cursor: pointer; display: none;">
                Xem thêm ▼
            </button>


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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let moTa = document.getElementById("moTa");
            let xemThem = document.getElementById("xemThem");

            // Kiểm tra nếu nội dung dài hơn giới hạn thì hiện nút "Xem thêm"
            if (moTa.scrollHeight > 60) {
                xemThem.style.display = "inline"; // Hiện nút
            }

            xemThem.addEventListener("click", function () {
                if (moTa.style.maxHeight === "60px") {
                    moTa.style.maxHeight = "none"; // Hiện toàn bộ nội dung
                    this.innerText = "Thu gọn ▲";
                } else {
                    moTa.style.maxHeight = "60px"; // Giới hạn lại
                    this.innerText = "Xem thêm ▼";
                }
            });
        });
    </script>
@endsection
@section('footer')
    @php
        $sliderFooter=$Sliders
    @endphp
@endsection
