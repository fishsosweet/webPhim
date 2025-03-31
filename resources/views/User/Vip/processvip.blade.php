@extends('User.main')
@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 500px; font-family: Arial, sans-serif;">

    <div style="text-align: center; background: white; padding: 30px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); max-width: 500px;">
        @if($status===1)
        <h3 style="color: #28a745;">Thanh toán thành công!</h3>
        <p style="color: #555;">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
        <a href="{{route('homekhophim-get')}}" style="display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">Quay về trang chủ</a>
        @else
            <h3 style="color: red;">Thanh toán thất bại!</h3>
            <a href="{{route('homekhophim-get')}}" style="display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">Quay về trang chủ</a>
        @endif
    </div>

    </div>
@endsection
