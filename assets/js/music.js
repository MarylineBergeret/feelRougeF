
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


    volumeControl.addEventListener("input", function() {
        audioList.forEach(audio => {
            audio.volume = volumeControl.value / 100;
        });
    });
}