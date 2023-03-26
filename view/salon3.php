<div class="image-container">
    <img src="..\assets\image\1637.jpg" alt="salon d'écoute" id="listen">

    <?php
    $music_list = [        
        ['name' => 'music1', 'src' => '..\assets\image\Symphony_X_-_Wicked (mp3cut.net) (1).mp3'],
        ['name' => 'music2', 'src' => '..\assets\music\music2.mp3'],
        ['name' => 'music3', 'src' => '..\assets\music\music3.mp3'],
        ['name' => 'music4', 'src' => '..\assets\music\music4.mp3'],
        ['name' => 'music5', 'src' => '..\assets\music\music5.mp3'],
    ];

    for ($index = 0; $index < count($music_list); $index++) {
        echo '<div id="point'.$index.'" class="pointing-div">';
        echo '<audio id="myAudio'.$index.'" src="'.$music_list[$index]['src'].'"></audio>';
        echo '<button onclick="playMusic('.$index.')">Play '.$music_list[$index]['name'].'</button>';
        echo '<span class="pointer"></span>';
        echo '</div>';
    }
    ?>
</div>

<script>
    function playMusic(index) {
        let audio = document.getElementById("myAudio"+index);
        audio.play();
    }
</script>
