
<div>
    <div>
        <img src="" alt="id_image">
        $email = "monadresseemail@example.com";
$masked_email = substr_replace($email, str_repeat('*', 7), 1, 7) . substr($email, 8);
echo $masked_email; // Affiche "m*******@example.com"
<form method="post" action="modifier_profil.php">
    <label for="name">Nom:</label>
    <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>">

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" id="password" value="<?php echo $user['password']; ?>">

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>">

    <input type="submit" value="Enregistrer les modifications">
</form>


    </div>
    <div>
        
    </div>
</div>

<form method="POST" action="traitement.php">
  <label>Concert préféré 1 :</label>
  <input type="text" name="concert1"><br>

  <label>Concert préféré 2 :</label>
  <input type="text" name="concert2"><br>

  <label>Concert préféré 3 :</label>
  <input type="text" name="concert3"><br>

  <label>Concert préféré 4 :</label>
  <input type="text" name="concert4"><br>

  <label>Concert préféré 5 :</label>
  <input type="text" name="concert5"><br>

  <input type="submit" value="Envoyer">
</form>
