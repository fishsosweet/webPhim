
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<!-- Custom JS -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>

    document.querySelectorAll('.dropdown-toggle').forEach(item => {
        item.addEventListener('click', function () {
            const icon = this.querySelector('i');
            if (this.getAttribute('aria-expanded') === 'true') {
                icon.style.transform = 'rotate(0deg)';
            } else {
                icon.style.transform = 'rotate(90deg)';
            }
        });
    });
</script>
<textarea id="myTextarea"></textarea>
<script>
    ClassicEditor
        .create(document.querySelector('#mota'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    document.getElementById('anh').onchange = function () {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('image_show').innerHTML = '<img src="' + e.target.result + '" width="100px" />';
        };
        reader.readAsDataURL(this.files[0]);
    };
</script>
<script>
    document.getElementById("trailer1").addEventListener("input", function () {
        updateVideo(this.value, "previewTrailer1");
    });

    document.getElementById("trailer2").addEventListener("input", function () {
        updateVideo(this.value, "previewTrailer2");
    });

    function updateVideo(url, iframeId) {
        let videoId = extractYouTubeId(url);
        let iframe = document.getElementById(iframeId);

        if (videoId) {
            iframe.src = `https://www.youtube.com/embed/${videoId}`;
            iframe.classList.remove("d-none"); // Hiển thị video
        } else {
            iframe.src = "";
            iframe.classList.add("d-none"); // Ẩn video nếu nhập sai link
        }
    }

    function extractYouTubeId(url) {
        let match = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/);
        return match ? match[1] : null;
    }
</script>
<script>
    $(document).ready(function() {
        $('#theloai').select2({
            placeholder: "Chọn thể loại...",
            allowClear: true
        });
    });
</script>



</body>
</html>
