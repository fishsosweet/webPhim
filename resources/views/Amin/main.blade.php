@include('Amin.header')
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h2 class="text-center py-4">Admin</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin-home-get')}}">
                        <i class="fas fa-home"></i> Trang chính
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                        <i class="fas fa-film"></i> Thể loại
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #495057">
                        <li><a class="dropdown-item" href="{{route('add-categories-get')}}"><i class="fas fa-plus"></i> Thêm thể loại</a></li>
                        <li><a class="dropdown-item" href="{{route('list-categories-get')}}"><i class="fas fa-list"></i> Danh sách các thể loại</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-star"></i> Phim
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #495057">
                        <li><a class="dropdown-item" href="{{route('add-movie-get')}}   "><i class="fas fa-plus"></i>Thêm phim</a></li>
                        <li><a class="dropdown-item" href="{{route('list-movie-get')}}"><i class="fas fa-list"></i> Danh sách các phim</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-music"></i> Quản lý bài hát
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #495057">
                        <li><a class="dropdown-item" href=""><i class="fas fa-plus"></i> Thêm bài hát</a></li>
                        <li><a class="dropdown-item" href=""><i class="fas fa-list"></i> Danh sách bài hát</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i> Quản lý người dùng
                    </a>
                </li>
            </ul>
        </div>
        <!-- Main content -->
        <div class="col-md-10 content">
            @include('Amin.error')
            @yield('content') <!-- Nơi hiển thị nội dung -->
        </div>
    </div>
</div>
@include('Amin.footer')
