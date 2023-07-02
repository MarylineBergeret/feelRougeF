<?php
session_start();
include '../model/connect.php';

include '../view/view.header.php';

    // Liste des musiques avec leur nom et leur source
    $music_list = [
        ['name' => 'Symphony X', 'src' => '..\assets\image\Symphony_X_-_Wicked (mp3cut.net) (1).mp3'],
        ['name' => 'Pain of Salvation', 'src' => '..\assets\image\Pain_of_Salvation_-_Ending_Themes_On_the_Two_Deaths_of_Pain_of_Salvation.mp3'],
        ['name' => 'Transatlantic', 'src' => '..\assets\image\Transatlantic_-_The_Whirlwind_Full_Live_From_Shepherds_Bush_Empire_London.mp3'],
        ['name' => 'Down', 'src' => '..\assets\image\Symphony_X_-_Wicked (mp3cut.net) (1).mp3'],
        ['name' => 'DreamTheater', 'src' => '..\assets\image\Pain_of_Salvation_-_Ending_Themes_On_the_Two_Deaths_of_Pain_of_Salvation.mp3'],
        ['name' => 'Haken', 'src' => '..\assets\image\Transatlantic_-_The_Whirlwind_Full_Live_From_Shepherds_Bush_Empire_London.mp3'],
    ];
include '../view/v.salon.php';
include '../view/v.foot.php';

?>
