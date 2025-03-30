<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập & Đăng ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;

        }

        body {
            background: url("{{ asset('/imgs/background.jpg') }}") no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Màu đen với độ trong suốt 50% */
            z-index: -1;
        }
        .container {

            background: rgba(0, 0, 0, 0.8);
            padding: 40px;
            width: 350px;
            border-radius: 8px;
            text-align: center;
            color: white;
            position: relative;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .hidden {
            display: none;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: none;
            background: #333;
            color: white;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: red;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background: darkred;
        }
        .google-btn:hover {
            background: rgb(30, 95, 209);
        }
        p {
            font-size: 14px;
            color: #ccc;
        }

        p a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }.google-btn {
             display: flex;
             align-items: center;
             justify-content: center;
             background: rgb(20, 90, 182);
             color: white;
             font-weight: bold;
             margin-top: 10px;
             padding: 10px;
             border-radius: 5px;

             cursor: pointer;
         }

        .google-btn img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        .form input{
            border: solid 1px white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-box">

        <form id="login-form" class="form"  method="POST" action="">
            @csrf
            <h2>Đăng nhập</h2>
            @include('Amin.error')
            <button type="button" class="btn google-btn" formaction="{{route('login-khophim-post')}}">
                <i class="fab fa-google" style="margin-right: 20px;"></i> Đăng nhập bằng Google
            </button>
            <input type="text" name="email"  placeholder="Email hoặc số điện thoại" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit" class="btn">Đăng nhập</button>
            <p>Bạn chưa có tài khoản? <a href="#" id="show-register">Đăng ký ngay</a></p>
        </form>

        <form id="register-form" class="form hidden" action="{{route('register-khophim-post')}}" method="POST">
            @csrf
            <h2>Đăng ký</h2>
            <input type="text" placeholder="Tên đầy đủ"  name="name" >
            <input type="email" placeholder="Email"  name="emailregi"  >
            <input type="password" placeholder="password" name="passwordregi">
            <input type="password" placeholder="Xác nhận mật khẩu" name="rePassword" >
            <button type="submit" class="btn" >Đăng ký</button>
            <p>Bạn đã có tài khoản? <a href="#" id="show-login">Đăng nhập</a></p>
        </form>
    </div>
</div>

<script>
    document.getElementById("show-register").addEventListener("click", function (e) {
        e.preventDefault();
        document.getElementById("login-form").classList.add("hidden");
        document.getElementById("register-form").classList.remove("hidden");
    });

    document.getElementById("show-login").addEventListener("click", function (e) {
        e.preventDefault();
        document.getElementById("register-form").classList.add("hidden");
        document.getElementById("login-form").classList.remove("hidden");
    });

</script>
</body>
</html>
