<div>
<a href="../controller/deconnexion.php" class="deco">DECONNEXION</a>
</div>
    <!-- Titre -->
    <div class="row justify-content-center text-center">
        <h2 class="titles-pages">TABLEAU DE BORD</h2>
        <div class="col-4"><hr></div>
    </div>

    <div>
        <fieldset class="tabBord"><?php echo getAllUser($bdd)?></fieldset>
    </div>

    <div class="container mt-5 mb-5">



    <div>
        <fieldset class="tabBord">
        <form method="POST" action="create_cardFestival.php" enctype="multipart/form-data">
    
            <label for="name">Nom du carfestival :</label>
            <br>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="image">Image :</label>
            <br>
            <input type="file" id="image" name="image" required>
            <br>
            <label for="content">Contenu :</label>
            <br>
            <textarea id="content" name="content" rows="10" required></textarea>
            <br>
            <button type="submit">Créer</button>
        </fieldset>

    </form>
    </div>
