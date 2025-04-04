@extends('User.main')
@section('content')
    <div class="content-vip">
        <div class="container-card">
            @foreach($goiVip as $vip)
            <div class="card">
                <h4>KP - <span class="badge">{{$vip->name}}</span></h4>
                <span style="background-color: white;color: black">{{ number_format($vip->price, 0, ',', '.') }} VNĐ</span>
                <p>Nghe nhạc với chất lượng cao nhất, hông quảng cáo</p>
                <h5 class="fw-bold text-warning">Chỉ từ 13.000đ/tháng</h5>
                <form action="{{ route('vip-post',['id'=>$vip->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="total_vnpay" value="{{$vip->price}}">
                    <button type="submit" class="btn-custom"
                            name="redirect">ĐĂNG KÝ GÓI</button>
                </form>

                <ul>
                    <li><span class="check-icon">✔</span> Xem phim hông quảng cáo</li>
                    <li><span class="check-icon">✔</span> Xem và tải phim Lossless</li>
                    <li><span class="check-icon">✔</span> Xem phim hông giới hạn</li>
                    <li><span class="check-icon">✔</span> Hình ảnh, chất lượng nâng cao</li>
                    <li><span class="check-icon">✔</span> Mở rộng khả năng Upload</li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>

@endsection
