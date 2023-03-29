

function like(elem, idFestival, idUser){
    let valueLike = elem.textContent;
    let state;

    if(valueLike == "unlike"){
        elem.textContent = "like";
        state = "unlike"
    }else{
        elem.textContent = "unlike";
        state = "like"
    }
    $.ajax({
        type: "POST",
        url: "../controller/festival.php",
        data : {
            likeIdFestival : idFestival,
            likeIdUser : idUser,
            state : state,
        }
    });
}
const menuHamburger = document.querySelector(".menu-hamburger")
const navLinks = document.querySelector(".nav-links")

menuHamburger.addEventListener('click',()=>{
navLinks.classList.toggle('mobile-menu')
});

const cards = document.querySelectorAll('.dream-card');
cards.forEach((card) => {
  const img = card.querySelector('img');
  const text = card.querySelector('.text');
  img.addEventListener('click', () => {
    console.log('image clicked');
    card.classList.toggle('is-flipped');
  });
  text.addEventListener('click', () => {
    card.classList.toggle('is-flipped');
  });
});


 

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




