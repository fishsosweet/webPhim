
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
    let backgrounds = [
        "url('images/phim2.webp')",
        "url('images/phim1.jpeg')",
        "url('images/phim3.jpg')"
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

</body>
</html>
