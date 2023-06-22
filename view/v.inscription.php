  <div class="container">
    <h1>FORMULAIRE D'INSCRIPTION</h1>
    <div id="fond">
      <div id="fond1">
        <!-- La balise Table pour formater l'affichage du formulaire -->
        <form id="form1" action="../controller/inscription.php" method="POST">
          <table>
            <tr>
              <td>
                <label for="pseudo">Pseudo</label><br>
                <input class="input-shadow" type="text" id="pseudo" name="pseudo"  value="<?php echo isset($pseudo) ? $pseudo : ''; ?>">
                <button class="boutonInfo"><img src="../assets/image/pointInterrogation.png" alt="Info"></button>
                <div class="infoInscription">"Entre 5 et 20 lettres"</div>
              </td>
            </tr>
            <tr>
              <td>
                <label for="pwd">Password</label><br>
                <input class="input-shadow" type="password" id="pwd" name="pwd">
                <button class="boutonInfo"><img src="../assets/image/pointInterrogation.png" alt="Info"></button>
                <div class="infoInscription">"5 caractères minimum, 1 Majuscule, 1 caractère spécial"</div>
              </td>
            </tr>
            <tr>
              <td>
                <label for="mail">Mail</label><br>
                <input class="input-shadow" type="email" id="mail" name="mail" value="<?php echo isset($mail) ? $mail : ''; ?>">
                <button class="boutonInfo"><img src="../assets/image/pointInterrogation.png" alt="Info"></button>
                <div class="infoInscription">"Exemple : -----@----.fr"</div>
              </td>
            </tr>
            <tr>
              <td>
                <label for="bio">Bio</label><br>
                <input class="input-shadow" type="text" id="bio" name="bio" value="<?php echo isset($bio) ? $bio : ''; ?>">
                <button class="boutonInfo"><img src="../assets/image/pointInterrogation.png" alt="Info"></button>
                <div class="infoInscription">"saisir votre Bio - Lâchez-vous... Mais pas trop ..."</div>
              </td>
            </tr>
            <tr>
              <td>
                <button type="submit" name="submit">ENVOYER</button>
              </td>
            </tr>
          </table>
        </form>
      </div> <!-- fond1 -->
    </div> <!-- fond -->
  </div>

  <?php
  // Cette condition vérifie si la variable $errors existe et n'est pas vide.
  if(isset($errors) AND !empty($errors)):
    // Si la condition est vraie, on combine tous les messages d'erreur en utilisant "<br>" comme séparateur et on stocke le résultat dans la variable $error.
    $error = implode("<br>", $errors);
  ?>
    <div class="col">
      <!-- On affiche le message d'erreur dans une div d'alerte rouge -->
      <div class="alert alert-danger error-container">
        <?php echo $error; ?>
      </div>
    </div> 
    <?php elseif(!isset($errors)): ?>
    <!-- Si la condition est vraie, donc pas d'erreur, on affiche un message de succès dans une div d'alerte verte -->
    <div class='alert alert-success col-6 succes-container'>
      YES ! Vous avez été inscrit avec succès !
      <a href='../controller/connexion.php'>Connectez-vous</a> pour avoir accès à votre compte.
    </div>
    <div class="fireworks">
      <img src="https://media.giphy.com/media/Y0ONBmHnbK8Y0QBpXb/giphy.gif" alt="Feux d'artifice 2">
      <img src="https://media.giphy.com/media/SGld0SRSJzZuKAm9c1/giphy.gif" alt="Feux d'artifice 2">
      <img src="https://media.giphy.com/media/da2BzS5gQGNQTU04x1/giphy.gif" alt="Feux d'artifice 2">
    </div>       
    <?php endif; ?>

  <div class="fond3">
    <img src="https://media.giphy.com/media/QTi3uyWcyJxeAAeTNB/giphy.gif" alt="flèches">
  </div>
  <div class="fond2-container">
    <div class="fond2">
      <div class="row">
        <div class="col text-center">
          <img src="../assets/image/faq.png" alt="Foire aux questions" id="logFaq">
        </div>
      </div><!--row-->   
      <div class="row">
        <div class="col" id="textFaq"> 
          <p><span class="question">1- Question :</span> Pourquoi?<br>
          <span class="response">Réponse :</span> Mais Parce QUE</p><br>
          <p><span class="question">2- Question :</span> Pourquoi devrais-je choisir ce site pour trouver des festivals de métal en Europe ?<br>
          <span class="response">Réponse :</span> Parce que nous avons rassemblé les meilleurs festivals de métal européens au même endroit ! Vous n'aurez plus besoin de chercher ailleurs.</p><br>
          <p><span class="question">3- Question :</span> Est-ce que ce site couvre tous les sous-genres de métal ?<br>
          <span class="response">Réponse :</span> Absolument pas! Pas le temps de parler de tous!!!</p><br>
          <p><span class="question">4- Question :</span> Quels sont les critères pris en compte pour évaluer les festivals ?<br>
          <span class="response">Réponse :</span> En fonction de la qualité des groupes présents, de l'atmosphère, des infrastructures, de l'accessibilité, et bien sûr, du kiff et des vibrations !</p><br>
          <p><span class="question">5- Question :</span> Comment puis-je acheter des billets pour les festivals recommandés ?<br>
          <span class="response">Réponse :</span> Liens directs vers les sites pour chaque festival. Il vous suffit de cliquer sur le lien et de suivre les instructions pour acheter vos billets en ligne.</p><br>
          <p><span class="question">6- Question :</span> Est-ce que ce site est régulièrement mis à jour avec de nouveaux festivals ?<br>
          <span class="response">Réponse :</span> Absolument ! Chaque année afin de garder notre liste de festivals à jour en ajoutant de nouvelles recommandations régulièrement. Revenez souvent pour découvrir les dernières nouveautés !</p><br>
        </div>
      </div><!--row-->   
      <div class="row">
        <div class="col text-center">
          <img src="../assets/image/fosse.png" alt="Image Foule">
        </div>
      </div><!--row-->   
    </div><!--fond2 -->
  </div> 
  

