@extends('Amin.main')

@section('content')
    <table class="table" style="color: black">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên user</th>
            <th>Tên gói VIP</th>
            <th>Số tháng</th>
            <th>Active</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($Vip as $vip)
            <tr >
                <th style="width: 50px;background-color: white;color: black ">{{$vip->id}}</th>
                <th style="background-color: white;color: black">{{$vip->user ?$vip->user->name:""}}</th>
                <th style="background-color: white;color: black">{{$vip->name}}</th>
                <th style="background-color: white;color: black">{{$vip->plan}} tháng</th>
                <th style="background-color: white;color: black">{!!$vip->active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>': '<span class="btn btn-success btn-xs">YES</span>'!!}</th>
                <th style="width: 100px; background-color: white; color: black;">
                    <div class="d-flex align-items-center">

                        <form action="{{route('delete-vip-post',$vip->id)}}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa gói vip này không?')">
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
        {!! $Vip->links() !!}
    </div>

@endsection
