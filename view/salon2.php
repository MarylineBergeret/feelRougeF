<div class="image-container">
    <img src="..\assets\image\1637.jpg" alt="salon d'écoute" id="listen">

    <div id="point" class="pointing-div"><a href="..\assets\image\Symphony_X_-_Wicked (mp3cut.net) (1).mp3" onclick="playMusic()">Play</a>
    
        <span class="pointer"></span>
    </div>
    <div id="point1" class="pointing-div"><audio id="myAudio" src="..\assets\image\Symphony_X_-_Wicked (mp3cut.net) (1).mp3"></audio>

<button onclick="playMusic()">Play</button>

        <span class="pointer"></span>
    </div>
    <div id="point2" class="pointing-div"><a href="#" onclick="playMusic()">Play</a>

    <span class="pointer"></span>
    </div>
    <div id="point3" class="pointing-div"><a href="#" onclick="playMusic()">Play</a>

    <span class="pointer"></span>
    </div>
    <div id="point4" class="pointing-div"><a href="#" onclick="playMusic()">Play</a>

    <span class="pointer"></span>
    </div>
    <div id="point5" class="pointing-div"><a href="#" onclick="playMusic()">Play</a>

    <span class="pointer"></span>
    </div>
</div>
<script>
    let audio = document.getElementById("myAudio");

    function playMusic() {
        audio.play();
    }
</script>