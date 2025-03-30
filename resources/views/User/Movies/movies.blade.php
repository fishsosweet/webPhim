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

                    <div class="movie-list-screen">
                        @foreach($randMovies as $phim)
                            <a href="{{ route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                               style="text-decoration: none">
                                <div class="movie-item">
                                    <img src="{{asset($phim->poster_url)}}" alt="{{asset($phim->poster_url)}}">
                                    <div class="movie-info">
                                        <p class="movie-title">{{$phim->title}}</p>
                                        <p class="movie-views">{{$phim->views}} lượt xem</p>
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
            <form id="comment-form" method="POST">
                @csrf
                <h3 style="color:white ">Bình luận</h3>
                <input type="hidden" name="movie_id" value="{{ $Phim->id }}" id="movie_id">
                <textarea class="comment-box" placeholder="Viết bình luận..." name="content"
                          id="comment-content"></textarea>
                <input type="submit" value="Gửi" class="btn-submit" name="guicmt">
            </form>
            <div id="container-list-cmt">
                @foreach($cmts as $cmt)
                    <div class="comment">
                        <strong style="color: white;font-size: 18px">{{$cmt->user->name}}</strong>
                        <p style="color: white">{{$cmt->content}}</p>
                        <p style="color: white;font-size: 10px";>{{ \Carbon\Carbon::parse($cmt->created_at)->format('d/m/Y') }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="last-main-container" style="margin-bottom: 0">
            <h2 style="color: #ff7b00; font-size: 24px; font-weight: bold; margin-bottom: 10px;">Cùng thể loại</h2>
            <div class="section-divider"
                 style="width: 100%; height: 2px; background-color: #ff7b00; margin-bottom: 15px;"></div>

            <div class="movie-list-home" style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
                @foreach($belongTo as $phim)
                    <a href="{{ route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
                       style="text-decoration: none; color: black;margin-bottom: 10px">
                        <div class="movie"
                             style="width: 160px; height: 240px; background-color:#e38f51; padding: 0px; border-radius: 5px; position: relative; text-align: center;">

                            <img src="{{asset($phim->poster_url)}}"
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
    </div>
    <script>
        $(document).ready(function () {
            let movieId = $('#movie_id').val();
            // Gửi bình luận
            $('#comment-form').on('submit', function (e) {
                e.preventDefault();

                let content = $('#comment-content').val().trim();
                if (content === "") {
                    alert("Vui lòng nhập bình luận!");
                    return;
                }

                $.ajax({
                    url: "{{ route('comments.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        movie_id: movieId,
                        content: content
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#comment-content').val('');

                            // Thêm bình luận ngay lập tức mà không cần tải lại
                            let newComment = `
                        <div class="comment">
                            <strong style="color: white;font-size: 18px">${response.comment.user.name}</strong>
                            <p style="color: white">${response.comment.content}</p>
                        </div>`;

                            $('#container-list-cmt').prepend(newComment);
                        }
                    },

                    error: function (xhr) {
                        console.error("Lỗi khi gửi bình luận:", xhr.responseText);
                    }
                });
            });
            let latestCommentId = 0;
            // Lấy danh sách bình luận mới nhất
            function loadComments() {
                $.ajax({
                    url: "{{ route('comments.latest', ['id' => $Phim->id, 'name' => Str::slug($Phim->title)]) }}",
                    method: "GET",
                    success: function (response) {
                        let commentsHtml = "";
                        response.comments.forEach(comment => {
                            commentsHtml += `
                        <div class="comment">
                            <strong style="color: white;font-size: 18px">${comment.user.name}</strong>
                            <p style="color: white";>${comment.content}</p>
                            <p style="color: white;font-size: 10px";>${comment.created_at}</p>
                        </div>`;
                            latestCommentId = comment.id;
                        });

                        $('#container-list-cmt').html(commentsHtml);
                    },

                    error: function (xhr) {
                        console.error("Lỗi khi tải bình luận:", xhr.responseText);
                    }
                });
            }

            // Gọi AJAX mỗi giây để cập nhật bình luận mới
            setInterval(loadComments, 1000);
        });
    </script>
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
