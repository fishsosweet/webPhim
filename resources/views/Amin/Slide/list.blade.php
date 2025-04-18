@extends('Amin.main')

@section('content')
    <table class="table" style="color: black">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên slider</th>
            <th>Ảnh</th>
            <th>Vị trí</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($Slider as $slider)
            <tr >
                <th style="width: 50px;background-color: white;color: black ">{{$slider->id}}</th>
                <th style="background-color: white;color: black">{{$slider->name}}</th>
                <th style="background-color: white;color: black"> <img src="{{asset($slider->thum)}}" style="width: 100px;height: 100px"></th>
                <th style="background-color: white;color: black">{{$slider->sort}}</th>
                <th style="background-color: white;color: black">{!!$slider->active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>': '<span class="btn btn-success btn-xs">YES</span>'!!}</th>
                <th style="background-color: white;color: black">{{$slider->updated_at}}</th>
                <th style="width: 100px; background-color: white; color: black;">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-primary btn-sm me-1" href="{{route('edit-slider-get',$slider->id)}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{route('delete-slider-post',$slider->id)}}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa slider này không?')">
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
        {!! $Slider->links() !!}
    </div>

@endsection
