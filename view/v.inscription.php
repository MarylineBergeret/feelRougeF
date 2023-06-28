  <div class="container">
    <h1 id="formTitle">FORMULAIRE D'INSCRIPTION</h1>
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
                <div class="infoInscription">"Entre 5 et 20 lettres sans caractères spéciaux"</div>
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
    <div class="col" >
      <!-- On affiche le message d'erreur dans une div d'alerte rouge -->
      <div class="alert alert-danger error-container">
        <?php echo $error; ?>
      </div>
    </div> 
    <?php elseif(!isset($errors)): ?>
    <!-- Si la condition est vraie, donc pas d'erreur, on affiche un message de succès dans une div d'alerte verte -->
    <div class='alert alert-success col-6 succes-container'>
      <p>YES ! Vous avez été inscrit avec succès !
      <a href='../view/v.connexion.php'>Connectez-vous</a> pour avoir accès à votre compte.</p>
    </div>
    <div class="fireworks">
      <img src="https://media.giphy.com/media/Y0ONBmHnbK8Y0QBpXb/giphy.gif" alt="Feux d'artifice 2">
      <img src="https://media.giphy.com/media/SGld0SRSJzZuKAm9c1/giphy.gif" alt="Feux d'artifice 2">
      <img src="https://media.giphy.com/media/da2BzS5gQGNQTU04x1/giphy.gif" alt="Feux d'artifice 2">
    </div>       
    <?php endif; ?>
    

  
  

