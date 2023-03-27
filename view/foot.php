
<!-- Inclure le lien vers la bibliothèque d'icônes de Bootstrap -->

    <script>
    window.addEventListener("scroll", function() {
        let footer = document.querySelector("footer");
        let bodyHeight = document.body.offsetHeight;
        let windowHeight = window.innerHeight;
        let scrollPosition = window.scrollY || window.pageYOffset || document.body.scrollTop + (document.documentElement && document.documentElement.scrollTop || 0);

        if (bodyHeight - windowHeight <= scrollPosition) {
            footer.style.display = "block";
        } else {
            footer.style.display = "none";
        }
    });
    </script>
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
<footer>
    <img id="footer" src="..\assets\image\fotor_2023-3-24_17_12_40.png" alt="vibrations">
</footer>
</html>

