<h1>Formulaire d'inscription</h1>
  <!-- <div id="imgFond"><img src="assets\ondes.png" width="290px" height="150px" alt="sound"></div> -->
  <?php
        if(isset($errors) AND !empty($errors)):
        $error = implode("<br>", $errors);
    ?>
    <div class="col">
        <div class="alert alert-danger">
            <?php echo $error;?>
        </div>
    </div>
    <?php elseif(!isset($errors)):?>
        <div class='alert alert-success col-6'>Vous avez été inscrit avec succès. <a href='../controller/connexion.php'>Connectez-vous</a> pour avoir accès à votre compte.</div>
    <?php endif; ?>
  
  
  <!-- La balise Table pour formater l'affichage du formulaire -->
    <form method="POST">
    <div id="fond">
    <!-- <fieldset> -->
      <table>
          <tr>
          <label for="pseudo">Pseudo</label>
            <td><input type="text" name="pseudo" placeholder="saisir votre Pseudo"/> </td>
          </tr>
          <tr>
          <label for="pwd">Password</label>
            <td><input type="text" name="pwd" placeholder="saisir votre mot de passe"/></td>
          </tr>
          <tr>
          <label for="mail">Mail</label>
            <td><input type="email" name="mail" placeholder="saisir votre Email"/></td>
          </tr>
          <tr>
          <label for="bio">Bio</label>
            <td><input type="text" name="bio" placeholder="saisir votre Bio"/></td>
          </tr>
          
          <tr>
            <td><button type="submit" name="submit">ENVOYER</button></td>
          </tr>  
    
      </table>
      

      
    <!-- </fieldset> -->

    </div>
    

  </div>

