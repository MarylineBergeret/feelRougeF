<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-6">
      <h2 class="titles-pages">CONNEXION</h2>
      <?php
        if(isset($errors) AND !empty($errors)):
        $error = implode("<br>", $errors);
      ?>
      <div class="col">
        <div class="alert alert-danger">
            <?php echo $error;?>
        </div>
      </div>
      <?php endif; ?>

      <form action="../controller/connexion.php" method="post">
          <div class="form-group mt-4 mb-4">
            <label for="pseudo">PSEUDO</label>
            <input type="text" class="m" name="pseudo" id="" placeholder="Rentrez votre pseudo">
          </div>
          <div class="form-group1 mt-4 mb-4">
            <label for="pwd">MOT DE PASSE</label>
            <input type="password" class="n" name="pwd" placeholder="Mot de passe" id="">
          </div>
          <div class="form-group mt-4 mb-4 justify-content-center"></div>
          <button type="submit" class="btn btn-inscription text-white">CONFIRMER</button>
        </div>
      </form>
      <p class="text-center">Pas de compte ? <a href="../controller/inscription.php" class="fw-bold color-bordeau">Inscrivez-vous</a> dès maintenant !</p>

    </div>
  </div>
</div>

