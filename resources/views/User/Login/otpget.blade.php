<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập mã OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-900">
<div class="bg-white p-8 rounded-lg shadow-lg text-center w-96">
    <form action="{{ route('otp-post') }}" method="POST">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Xác nhận OTP</h2>
        @include('Amin.error')
        <p class="text-gray-500 mb-6">Nhập mã OTP đã gửi đến email của bạn.</p>

        <div class="flex justify-center space-x-2 mb-4">
            @for ($i = 0; $i < 6; $i++)
                <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-12 text-center text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            @endfor
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Xác nhận</button>
    </form>

    <!-- Form gửi lại OTP -->
    <form action="{{ route('otpagain-post') }}" method="POST" class="mt-4">
        @csrf
        <p class="text-gray-400 text-sm">Không nhận được OTP?</p>
        <button type="submit" class="text-blue-600">Gửi lại OTP</button>
    </form>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const inputs = document.querySelectorAll(".otp-input");
        inputs.forEach((input, index) => {
            input.addEventListener("input", function () {
                if (this.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
            input.addEventListener("keydown", function (e) {
                if (e.key === "Backspace" && this.value === "" && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    });
</script>
</body>
</html>
