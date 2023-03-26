    <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<!-- Inclure le lien vers la bibliothèque d'icônes de Bootstrap -->

<script>
window.addEventListener("scroll", function() {
    var footer = document.querySelector("footer");
    var bodyHeight = document.body.offsetHeight;
    var windowHeight = window.innerHeight;
    var scrollPosition = window.scrollY || window.pageYOffset || document.body.scrollTop + (document.documentElement && document.documentElement.scrollTop || 0);

    if (bodyHeight - windowHeight <= scrollPosition) {
        footer.style.display = "block";
    } else {
        footer.style.display = "none";
    }
});
</script>
</body>
<footer>
    <img id="footer" src="..\assets\image\fotor_2023-3-24_17_12_40.png" alt="vibrations">
</footer>
</html>

