<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KhoPhim</title>
    <style>
        body {
            overflow-x: hidden;
            height: auto;
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
            height: 1000px;
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
            color: red;
            margin-left: 20px;
        }
        .sign-in {
            background-color: red;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            margin-right: 20px;
        }
        .menu {
            display: flex;
            justify-content: center;
            background-color: #222;
            padding: 10px 0;
        }
        .menu a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            font-weight: bold;
        }
        .menu a:hover {
            color: red;
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
            background-color: red;
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
            background-color: red;
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




    </style>
</head>
