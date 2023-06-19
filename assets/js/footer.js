

window.addEventListener("scroll", function() {
    let footer = document.querySelector("footer");
    let bodyHeight = document.body.offsetHeight;
    let windowHeight = window.innerHeight;
    let scrollPosition = window.scrollY || (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    if (bodyHeight - windowHeight <= scrollPosition) {
        footer.style.display = "block";
    } else {
        footer.style.display = "none";
    }
});
