
<h1>Modifier mes données</h1>
<form method="post" action="../controller/update.php">
    <label for="pseudo">Pseudo:</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?php echo isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '' ?>" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['mail']) ? $_SESSION['mail'] : '' ?>" required><br>
    <label for="password">Mot de passe:</label><br>
    <input type="password" id="password" name="password" value="<?php echo isset($_SESSION['pwd']) ? $_SESSION['pwd'] : '' ?>" required><br><br>
    <input type="submit" value="Mettre à jour">
</form>






