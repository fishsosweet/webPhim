@if(isset($movies) && count($movies) > 0)
    @foreach($movies as $phim)
        @if($phim->is_vip && auth('web')->user()->vip_status)
            <a href="{{ route('khophim-watch-get', ['id' => $phim->id, 'name' => Str::slug($phim->title)]) }}"
               style="text-decoration: none; color: black;margin-bottom: 10px">
                <div class="movie"
                     style="width: 160px; height: 240px; background-color:#e38f51; padding: 0px; border-radius: 5px; position: relative; text-align: center;">
                    <div class="vip-banner">VIP</div>
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
        @elseif(!$phim->is_vip)
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
        @endif
    @endforeach
@endif
