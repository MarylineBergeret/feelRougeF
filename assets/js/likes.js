

function like(elem, idFestival, idUser){
    let valueLike = elem.textContent;
    let state;

    if(valueLike == "unlike"){
        elem.textContent = "like";
        state = "like"
    }else{
        elem.textContent = "unlike";
        state = "unlike"
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


     // Liste de tous les éléments audio sur la page
    let audioList = document.querySelectorAll("audio");

    let volumeControl = document.getElementById("volume-control");
    let currentAudioTime = 0;
    function playMusic(index) {
        // Pause all other audio elements - Pause tous les autres éléments audio
        audioList.forEach(audio => {
            if (audio.paused === false && audio.id !== "audio" + index) {
                audio.pause();
                audio.currentTime = 0;
            }
        });

        // Play or pause the selected audio element - Joue ou met en pause l'élément audio sélectionné
        let audio = document.getElementById("audio" + index);
        let currentAudio = null;
            if (audio.paused === true) {
                audio.currentTime = currentAudioTime;
                audio.play();
                
            } else {
                audio.pause();
                
                currentAudio = audio;
                currentAudioTime = audio.currentTime;
               
            }
    }

    volumeControl.addEventListener("input", function() {
        audioList.forEach(audio => {
            audio.volume = volumeControl.value / 100;
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
