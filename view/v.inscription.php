<!-- <script>

  function toggleDivs() {
  let div1 = document.getElementById('fond1');
  let div2 = document.querySelector('.fond2');
    if (div1.classList.contains('active')) {
        div1.classList.remove('active');
        div2.classList.add('active', 'animation');
    } else {
        div2.classList.remove('active');
        div1.classList.add('active', 'animation');
    }
}
</script> -->
<div class="form-check form-switch" id="inputFond">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="Toggle" checked>
  <br>
  <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
</div>
  <!-- <div id="imgFond"><img src="assets\ondes.png" width="290px" height="150px" alt="sound"></div> -->

  <?php
   // Cette condition vérifie si la variable $errors existe et n'est pas vide.
   if(isset($errors) AND !empty($errors)):
  // Si la condition est vraie, on combine tous les messages d'erreur en utilisant "<br>" comme séparateur et on stocke le résultat dans la variable $error.
    $error = implode("<br>", $errors);
  ?>
    <div class="col">
      <!--on affiche le message d'erreur dans une div d'alerte rouge -->
        <div class="alert alert-danger">
            <?php echo $error;?>
        </div>
    </div> 
     <!-- Si la condition est vraie, donc pas d'erreur, on affiche un message de succès dans une div d'alerte verte -->
    <?php elseif(!isset($errors)):?>
        <div class='alert alert-success col-6'>Vous avez été inscrit avec succès. <a href='../controller/connexion.php'>Connectez-vous</a> pour avoir accès à votre compte.</div>
    <?php endif; ?>
    <div id="fond">
    
      <div id="fond1">
      
    <!-- La balise Table pour formater l'affichage du formulaire -->
        <form id="form1" action="../controller/inscription.php" method="POST">   
        <h1>Formulaire d'inscription</h1>
        <!-- <fieldset> -->
          <table>
            <tr>
              <td><label for="pseudo">Pseudo</label><br>
              <input class="input-shadow" type="text" name="pseudo" placeholder="saisir votre Pseudo"> </td>
            </tr>
            <tr>
            
              <td><label for="pwd">Password</label><br>
              <input class="input-shadow" type="password" name="pwd" placeholder="saisir votre mot de passe"></td>
            </tr>
            <tr>
            
              <td><label for="mail">Mail</label><br>
              <input class="input-shadow" type="email" name="mail" placeholder="saisir votre Email"></td>
            </tr>
            <tr>
            
              <td><label for="bio">Bio</label><br>
              <input class="input-shadow" type="text" name="bio" placeholder="saisir votre Bio"></td>
            </tr>
            
            <tr>
              <td><button type="submit" name="submit">ENVOYER</button></td>
            </tr>  
      
          </table>      
      <!-- </fieldset> -->
        </form>
      </div>
      </div> 
      <div class="fond3">
        <img src="https://media.giphy.com/media/QTi3uyWcyJxeAAeTNB/giphy.gif" alt="flèches">
      </div>
      <div class="fond2">

      <h5>FAQ</h5>
      <p>Alors là, on parle de musique métal progressif, mon pote ! Si tu veux du bon vieux rock'n'roll qui suit une structure classique et prévisible, va écouter du AC/DC ou du Guns N' Roses. Mais si tu cherches à te laisser emporter dans un monde de rythmes irréguliers, de tonalités bizarres et de paroles qui vont te faire réfléchir, alors la musique métal progressif est faite pour toi !
        On parle ici de musiciens qui ont des compétences instrumentales que toi et moi on ne peut même pas imaginer. Ils jouent à des tempos si rapides que tu as l'impression que tes doigts vont tomber, et utilisent des techniques de guitare qui vont te faire exploser la tête. Et ils ne se contentent pas de jouer des riffs de guitare entraînants - ils te transportent dans un univers sonore multidimensionnel qui va te donner des frissons.

      Et ne parlons même pas des paroles ! On n'est pas dans le basique "je t'aime, moi non plus" ici. La musique métal progressif aborde des thèmes tels que la philosophie, la politique et la science-fiction - bref, tout ce qui va te faire réfléchir et remettre en question ta perception du monde.

      Alors, si tu es prêt à faire l'expérience de la musique la plus intense, la plus complexe et la plus folle que tu aies jamais entendue, mets-toi à l'écoute de la musique métal progressif, mon ami !</p>

      <p> laisse-moi te dire que l'expérience au camping du Hellfest, c'est quelque chose ! C'est comme un petit village métal qui se forme pendant trois jours, avec des tentes, des campings-cars, des drapeaux de groupes et des gens qui sont là pour profiter de la musique et de l'ambiance.

      Le camping est divisé en différents secteurs, chacun avec son propre thème et son propre style musical. Tu as le secteur Heavy Metal, le secteur Punk, le secteur Stoner... chacun avec sa propre ambiance et sa propre communauté de fans.

      Mais ce qui est vraiment cool, c'est l'ambiance générale. Tout le monde est là pour s'amuser, pour profiter de la musique et pour rencontrer des gens qui partagent la même passion. Tu peux rencontrer des gens de tous horizons, de tous âges, de tous pays... mais tu sais que vous avez tous une chose en commun : l'amour du métal.

      Et puis, il y a les activités ! Il y a des stands de nourriture, des bars, des boutiques de merchandising, des jeux, des concours... tu ne t'ennuieras jamais au camping du Hellfest, c'est sûr !

      Mais bon, on ne va pas se mentir, le camping du Hellfest, c'est aussi la galère. Les douches peuvent être limitées, les toilettes peuvent être bondées, il y a des queues pour tout... mais c'est ça qui fait partie du charme ! C'est une expérience unique que tu ne peux pas vivre ailleurs.

      Alors si tu aimes la musique métal, si tu aimes l'aventure et si tu es prêt à vivre une expérience que tu n'oublieras jamais, viens camper au Hellfest, mec !</p>

      <p>Alors, pour commencer, il est important de comprendre la différence entre le heavy metal et le hard rock. Bien que les deux genres soient souvent associés et partagent certaines caractéristiques, il existe des différences subtiles qui les distinguent.

      Le hard rock est généralement considéré comme un genre de musique plus "léger" que le heavy metal, avec des mélodies plus simples et des arrangements plus basiques. Le hard rock met souvent l'accent sur les guitares électriques et les riffs entraînants, ainsi que sur des paroles qui traitent souvent de l'amour, de la vie de rockstar, et de sujets plus légers.

      Le heavy metal, quant à lui, est un genre de musique plus "lourd", avec des rythmes plus complexes et des arrangements plus élaborés. Le heavy metal met souvent l'accent sur les solos de guitare virtuoses, les voix puissantes et les paroles qui traitent de sujets plus sombres tels que la guerre, la mort et la violence.

      Le heavy metal est souvent considéré comme la "source" de nombreux sous-genres de métal, dont le métal progressif. Le métal progressif est caractérisé par des structures de chansons plus complexes, des changements de tempo et de rythme, des influences de musique classique et jazz, et des paroles qui abordent souvent des sujets plus philosophiques et intellectuels.</p>
      </div>
    <div>
      <img src="https://media.giphy.com/media/fQ5LRK2P2wrd7ArLO2/giphy.gif" alt="">
    </div>