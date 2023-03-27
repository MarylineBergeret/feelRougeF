  <h1>CONNEXION</h1>
  <div id="mainConnexion">

    <form id="formConnexion" action="../controller/connexion.php" method="post">
    
      <?php if(isset($errors) && !empty($errors)) : ?>
        <div class="errors">
          <?php foreach($errors as $error) : ?>
            <p><?php echo $error; ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <table>
        <tr>
          <td><label for="pseudo">Pseudo</label><br>
          <input class="input-shadow" type="text" name="pseudo" placeholder="saisir votre Pseudo" required></td>
        </tr>
        <tr>
          <td><label for="pwd">Password</label><br>
          <input class="input-shadow" type="password" name="pwd" placeholder="saisir votre mot de passe" required></td>
        </tr>
        <tr>
          <td><button type="submit" name="submit" id="buttonConnexion" >Se connecter</button></td>
        </tr> 
        <tr>
          <td><a href="reset_pwd.php">Mot de passe oublié ?</a></td>
          </tr>
      </table>
    </form>

  </div>
  <div id="gifContent">
      <img src="https://media.giphy.com/media/kpGHI4zVTYNcCz7uQE/giphy.gif" class="gif1" alt="Come On">

      <img src="https://media.giphy.com/media/7M454RF3wQh5LKKwUO/giphy.gif" class="gif2" alt="Rock On">
    </div>
