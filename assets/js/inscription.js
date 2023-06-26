const buttonsInscription = document.querySelectorAll('.boutonInfo');

buttonsInscription.forEach(function(buttonInscription) {
  buttonInscription.addEventListener("mouseenter", function() {
    let parent = buttonInscription.parentNode;
    let info = parent.querySelector('.infoInscription');
    info.style.display = "block";
  });

  buttonInscription.addEventListener("mouseleave", function() {
    let parent = buttonInscription.parentNode;
    let info = parent.querySelector('.infoInscription');
    info.style.display = "none";
  });
});