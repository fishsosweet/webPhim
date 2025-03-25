
<footer style="position: relative;top: 10px">
    <p><a href="#">Questions? Contact us.</a></p>
    <div class="footer-links">
        <div>
            <a href="#">FAQ</a>
            <a href="#">Investor Relations</a>
            <a href="#">Privacy</a>
            <a href="#">Speed Test</a>
        </div>
        <div>
            <a href="#">Help Center</a>
            <a href="#">Jobs</a>
            <a href="#">Cookie Preferences</a>
            <a href="#">Legal Notices</a>
        </div>
        <div>
            <a href="#">Account</a>
            <a href="#">Ways to Watch</a>
            <a href="#">Corporate Information</a>
            <a href="#">Only on Netflix</a>
        </div>
        <div>
            <a href="#">Media Center</a>
            <a href="#">Terms of Use</a>
            <a href="#">Contact Us</a>
        </div>
    </div>
    <button class="lang-btn">🌐 English ▼</button>
    <p class="netflix">Kho Phim Vietnam</p>
</footer>





<script>
    document.getElementById("nextBtn").addEventListener("click", function() {
        let group1 = document.getElementById("group1");
        let group2 = document.getElementById("group2");

        group1.style.display = "none";
        group2.style.display = "flex";
    });

    document.getElementById("prevBtn").addEventListener("click", function() {
        let group1 = document.getElementById("group1");
        let group2 = document.getElementById("group2");

        group1.style.display = "flex";
        group2.style.display = "none";
    });

</script>

<script>
    window.addEventListener("scroll", function () {
        let nav = document.querySelector(".nav-container");
        if (window.scrollY > 50) {
            nav.classList.add("scrolled");
        } else {
            nav.classList.remove("scrolled");
        }
    });

</script>



<script>
    let backgrounds = [
        @foreach($sliderFooter as $slider)
            "url('{{ $slider->thum }}')",
        @endforeach
    ];

    let currentIndex = 0;

    function changeBackground() {
        let trangChu = document.querySelector('.TrangChu');
        trangChu.style.background = backgrounds[currentIndex] + " no-repeat center center/cover";

        // Tăng index để chuyển ảnh tiếp theo
        currentIndex++;
        if (currentIndex >= backgrounds.length) {
            currentIndex = 0;
        }
    }

    // Gọi hàm mỗi 15 giây
    setInterval(changeBackground, 5000);

    // Khởi chạy lần đầu
    changeBackground();

</script>
<script>
    // Lấy các phần tử
    const openFormBtn = document.getElementById("openFormBtn");
    const overlay = document.getElementById("overlay");
    const closeBtn = document.getElementById("closeBtn");
    const loginTab = document.getElementById("loginTab");
    const registerTab = document.getElementById("registerTab");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");

    // Khi nhấn vào nút "Đăng nhập" thì hiển thị form
    openFormBtn.addEventListener("click", function () {
        overlay.style.display = "flex";
    });

    // Khi nhấn vào nút "X" thì ẩn form
    closeBtn.addEventListener("click", function () {
        overlay.style.display = "none";
    });

    // Chuyển tab Đăng nhập
    loginTab.addEventListener("click", function () {
        loginForm.classList.remove("hidden");
        registerForm.classList.add("hidden");
        loginTab.classList.add("active");
        registerTab.classList.remove("active");
    });

    // Chuyển tab Đăng ký
    registerTab.addEventListener("click", function () {
        loginForm.classList.add("hidden");
        registerForm.classList.remove("hidden");
        registerTab.classList.add("active");
        loginTab.classList.remove("active");
    });
</script>
</body>
</html>
