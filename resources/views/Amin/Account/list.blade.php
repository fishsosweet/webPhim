@extends('Amin.main')

@section('content')
    <table class="table" style="color: black">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>VIP</th>
            <th>VIP_Expiry</th>
            <th>Created at</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($Account as $account)
            <tr >
                <th style="width: 50px;background-color: white;color: black ">{{$account->id}}</th>
                <th style="background-color: white;color: black">{{$account->name}}</th>
                <th style="background-color: white;color: black">{{$account->email}}</th>
                <th style="background-color: white;color: black">{!!$account->vip_status == 0 ? '<span class="btn btn-danger btn-xs">NO</span>': '<span class="btn btn-success btn-xs">YES</span>'!!}</th>
                <th style="background-color: white;color: black">{{$account->vip_expiry}}</th>
                <th style="background-color: white;color: black">{{$account->created_at}}</th>
                <th style="width: 100px; background-color: white; color: black;">
                    <div class="d-flex align-items-center">
                        <form action="{{ route('delete-account-post', $account->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa tài khoản này không?')">
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
        {!! $Account->links() !!}
    </div>

@endsection
