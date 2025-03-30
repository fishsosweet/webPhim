
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
        @foreach($Sliders as $slider)
            "url('{{ $slider->thum }}')",
        @endforeach
    ];

    let currentIndex = 0;

    function changeBackground() {
        let trangChu = document.querySelector('.TrangChu');
        if(trangChu)
        trangChu.style.background = backgrounds[currentIndex] + " no-repeat center center/cover";

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
</body>
</html>
