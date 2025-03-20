@if ($errors->any()) <!-- Báo lỗi validate -->
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
</div>
@endif


@if(Session::has('success'))
    <div class="alert alert-success">
        {!! Session::get('success') !!}
    </div>
@endif

@if (Session::has('error'))<!-- Báo thành của của with - session error -->
<div class="alert alert-danger">
    {{ Session::get('error') }}
</div>
@endif


@if(Session::has('flash_message'))
    <div class="alert alert-{{ Session::get('flash_level') }}">
        {{ Session::get('flash_message') }}
    </div>
@endif
