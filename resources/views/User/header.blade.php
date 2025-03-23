
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KhoPhim</title>
    <style>
        .main-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
            width: 100%;
            max-width: 1300px;
            margin: auto;
            padding: 20px;
        }

        .kho-phim {
            flex: 2;
            min-width: 600px;
        }


        .ranking {
            flex: 1;
            min-width: 300px;
            background-color: #1e1e1e;
            padding: 15px;
            border-radius: 8px;
        }


        .section-title {
            color: #ff7b00;
            text-transform: uppercase;
            border-bottom: 2px solid #ff7b00;
            padding-bottom: 5px;
        }


        .movie-slider {
            display: flex;
            flex-wrap: nowrap; /* Không cho phim xuống dòng */
            padding-bottom: 2px;
            scrollbar-width: thin; /* Làm nhỏ thanh cuộn */
            scrollbar-color: #555 #222;
        }

        .movie {
            flex: 0 0 auto;
            width: 180px;
            height: 200px;
            text-align: center;
        }

        .movie img {
            width: 100%;
            border-radius: 5px;
        }


        .movie:hover {
            transform: scale(1.05);
        }

        /* Danh sách xếp hạng */
        .ranking-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Mục trong xếp hạng */
        .ranking-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
        }

        /* Số thứ tự */
        .ranking-item span {
            font-weight: bold;
            color: white;
        }


        body {
            overflow-x: hidden;
            height: auto;
            background-color: #000022
        }
        * {
            padding: 0;
            margin-left: auto;
            margin-right: auto;
        }
        .TrangChu {
            width: 1520px;
            position: relative;
            top: -10px;
            height: 800px;
            overflow: hidden;
            transition: background 1s ease-in-out;
        }
        .TrangChu2 {
            background-color: #000022;
            width: 1520px;
            position: relative;
            top: -10px;
            height: 800px;
            overflow: hidden;
            display: flex; /* Dùng flexbox */
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
            gap: 20px; /* Khoảng cách giữa các ảnh */
        }

        .TrangChu3 {
            background-color: #000022;
            width: 1520px;
            position: relative;
            top: -10px;
            height: 1300px;
            overflow: hidden;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1f1f1f;
            padding: 15px 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ff7b00;;
            margin-left: 20px;
        }
        .sign-in {
            background-color: #ff7b00;;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            margin-right: 20px;
        }
        .menu {
            background: #222;
            display: flex;
            padding: 10px;
            z-index: 1000;
        }
        .menu > li {
            list-style: none;
            position: relative;
            padding: 10px 15px;
            color: white;
            cursor: pointer;
        }
        .menu > li:hover {
            background: #444;

        }
        .submenu {
            display: none;
            position: absolute;
            background: #333;
            top: 100%;
            left: 0;
            min-width: 150px;
        }
        .submenu li {
            list-style: none;
            padding: 10px;
            color: white;
            cursor: pointer;
        }
        .submenu li:hover {
            background: #555;
        }
        .menu > li:hover .submenu {
            display: block;
        }

        .banner {
            text-align: center;
            padding: 100px 20px;
        }
        .banner h1 {
            font-size: 48px;
            font-weight: bold;
            color: white;
        }
        .banner p {
            font-size: 20px;
            margin-top: 10px;
            color: white;
        }
        .email-box {
            margin-top: 20px;
        }
        .email-box input {
            padding: 10px;
            width: 300px;
            border: none;
            border-radius: 5px;
        }
        .email-box button {
            padding: 10px 15px;
            background-color: #ff7b00;;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        .movie-container {
            display: flex;
            justify-content: center; /* Căn giữa các ảnh */
            align-items: center;
            flex-wrap: wrap; /* Cho phép ảnh tự động xuống dòng nếu không đủ chỗ */
            padding: 20px;
        }

        .movie {
            background-color: #222;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            width: 220px; /* Điều chỉnh kích thước ảnh */
            transition: transform 0.3s;
            margin: 0 15px; /* Thêm khoảng cách giữa các ảnh */
        }

        .movie:hover {
            transform: scale(1.1);
        }
        .movie img {
            width: 100%;
            border-radius: 5px;
        }
        .movie-title {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        .movie-group {
            display: flex; /* Đảm bảo luôn hiển thị ngang */
            justify-content: center;
            gap: 20px;
        }

        .kieuchu{
            font-size: 18px;
            color: white;
        }
        .kieuchubu{
            font-size: 30px;
            color: white;
        }
        #nextBtn {
            background-color: #ff7b00;;
            color: white;
            font-size: 24px;
            border: none;
            border-radius: 8px;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            position: relative;
            top: 20px;
            left: 0;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
        }

        #nextBtn:hover {
            transform: scale(1.1);
        }
        #prevBtn {
            background-color: #ff7b00;;
            color: white;
            font-size: 24px;
            border: none;
            border-radius: 8px;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            position: relative;
            top: 20px;
            left: -10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
        }

        #prevBtn:hover {
            transform: scale(1.1);
        }

        footer {
            background-color: #000;
            color: #aaa;
            padding: 40px;
            text-align: center;

        }

        footer a {
            color: #aaa;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .footer-links div {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .lang-btn {
            background-color: #222;
            color: white;
            border: 1px solid #444;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }

        .lang-btn:hover {
            background-color: #333;
        }

        .netflix {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }
        .  .TrangChu4 {
            background-color: #000022;
            width: 1520px;
            position: relative;
            top: -10px;
            height: 1000px;
            overflow: hidden;
        }
        .ranking {
            width: 300px;
            background-color: #1e1e1e;
            padding: 15px;
            border-radius: 8px;
        }
        .ranking h2 {
            color: #ff7b00;
            text-transform: uppercase;
            border-bottom: 2px solid #ff7b00;
            padding-bottom: 5px;
        }
        .ranking-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #333;
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .ranking-item span {
            font-weight: bold;
            color: white;
        }
        .rank-number {
            background-color: #ff7b00;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 14px;
        }
        .nav-container {
            display: flex; /* Xếp các phần tử theo hàng ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
            justify-content: space-between; /* Canh đều giữa header và menu */
            padding: 10px 20px;
            background-color: #222; /* Tuỳ chỉnh màu nền */
        }

        .header {
            display: flex;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-right: 20px;
        }

        .sign-in {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .menu {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }

        .menu li {
            margin-right: 20px;
            color: white;
            position: relative;
            cursor: pointer;
        }

        .submenu {
            display: none;
            position: absolute;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .submenu li{
            width: 70px;
            font-size: 13px;
        }
        .menu li:hover .submenu {
            display: grid;
            grid-template-columns: repeat(5, auto);
            grid-template-rows: repeat(3, auto);
            gap: 5px;

        }
        .menu li:hover{
            background-color:  #ff7b00  ;
        }
    </style>
</head>
<body>

<div class="nav-container" style="position:relative;top: -10px">
    <div class="logo" style="color:  #ff7b00  ;">KHOPHIM</div>
    <div class="header">


    <ul class="menu">
        <li>TRANG CHỦ</li>
        <li>PHIM MỚI</li>
        <li>THỂ LOẠI
            <ul class="submenu">
                <li>Cổ Trang</li>
                <li>Hành Động</li>
                <li>Tâm Lý</li>
                <li>Chính Kịch</li>
                <li>Hình Sự</li>
                <li>Tình Cảm</li>
                <li>Bí Ẩn</li>
                <li>Khoa Học</li>
                <li>Viễn Tưởng</li>
                <li>Võ Thuật</li>
            </ul>
        </li>
        <li>QUỐC GIA
            <ul class="submenu">
                <li>Việt Nam</li>
                <li>Hàn Quốc</li>
                <li>Nhật Bản</li>
                <li>Mỹ</li>
                <li>Trung Quốc</li>
                <li>Thái Lan</li>
                <li>Pháp</li>
                <li>Ấn Độ</li>
                <li>Anh</li>
                <li>Đức</li>
            </ul>
        </li>
        <li>ĐỘ TUỔI
            <ul class="submenu">
                <li>Mọi lứa tuổi</li>
                <li>13+</li>
                <li>16+</li>
                <li>18+</li>
            </ul>
        </li>

        <li>LIÊN HỆ</li>
    </ul>

    </div>
    <a href="#" class="sign-in">Sign In</a>
</div>

