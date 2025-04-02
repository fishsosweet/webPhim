@extends('Amin.main')

@section('content')
    <table class="table" style="color: black">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên phim</th>
            <th>Mô tả</th>
            <th>Năm xuất bản</th>
            <th>Thời lượng</th>
            <th>Ảnh bìa</th>
            <th>Thể loại</th>
            <th>Active</th>
            <th>Vip</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($Movies as $movies)
            <tr >
                <th style="width: 50px;background-color: white;color: black ">{{$movies->id}}</th>
                <th style="background-color: white;color: black">{{$movies->title}}</th>
                <th style="background-color: white;color: black">{{$movies->description}}</th>
                <th style="background-color: white;color: black">{{$movies->release_year}}</th>
                <th style="background-color: white;color: black">{{$movies->duration}}p</th>
                <th style="background-color: white;color: black"> <img src="{{asset($movies->poster_url)}}" style="width: 100px;height: 100px"></th>
                @php
                    $categories = $movies->category;
                @endphp
                <th style="background-color: white; color: black">
                        @foreach($categories as $category)
                            <div>
                                <p>{{ $category->name }}</p>
                            </div>
                        @endforeach
                </th>
                <th style="background-color: white;color: black">{!!$movies->active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>': '<span class="btn btn-success btn-xs">YES</span>'!!}</th>
                <th style="background-color: white;color: black">{!!$movies->is_vip == 0 ? '<span class="btn btn-danger btn-xs">NO</span>': '<span class="btn btn-success btn-xs">YES</span>'!!}</th>
                <th style="width: 100px; background-color: white; color: black;">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-primary btn-sm me-1" href="{{ route('edit-movie-get', $movies->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('delete-movie-post', $movies->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa phim này không?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </th>

            </tr> @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-2">
        {!! $Movies->links() !!}
    </div>

@endsection
