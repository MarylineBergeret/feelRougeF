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

      <form method="post">
          <div class="form-group mt-4 mb-4">
            <label for="mail">EMAIL</label>
            <input type="email" class="form-control" name="mail" placeholder="Email" id="mail" value="<?php echo isset($_POST['mail']) ? $mail : '';?>">
          </div>
          <div class="form-group1 mt-4 mb-4">
            <label for="pxd">MOT DE PASSE</label>
            <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" id="pwd" value="<?php echo isset($_POST['pwd']) ? $pwd : '';?>">
          </div>
          <div class="form-group mt-4 mb-4 justify-content-center"></div>
          <button type="submit" class="btn btn-inscription text-white">CONFIRMER</button>
        </div>
      </form>
      <p class="text-center">Pas de compte ? <a href="../controller/inscription.php" class="fw-bold color-bordeau">Inscrivez-vous</a> dès maintenant !</p>

    </div>
  </div>
</div>

