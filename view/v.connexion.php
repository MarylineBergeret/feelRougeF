<main class="main_connexion">
  <h2>Connexion</h2>
  <form class="form_connexion" action="../controller/connexion.php" method="post">
    <?php if(isset($errors) && !empty($errors)) : ?>
      <div class="errors">
        <?php foreach($errors as $error) : ?>
          <p><?php echo $error; ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required>

    <label for="pwd">Mot de passe :</label>
    <input type="password" id="pwd" name="pwd" required>

    <input type="submit" name="submit" value="Se connecter">

    <a href="reset_pwd.php">Mot de passe oublié ?</a>

  </form>
</main>
