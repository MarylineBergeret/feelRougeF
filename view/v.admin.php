    <div>
    <a href="../controller/deconnexion.php" class="deco">DECONNEXION</a>
    </div>
    <!-- Titre -->
    <div class="row justify-content-center text-center">
        <h2 class="titles-pages">TABLEAU DE BORD</h2>
        <div class="col-4"><hr></div>
    </div>

    <div>
        <fieldset class="tabBord">
            <table class='separate'>
                <tr><th>ID USER</th><th>PSEUDO</th><th>MAIL</th><th>ROLE</th><th>ACTIONS</th><th>ICONE</th><tr>
                <?php foreach ($users as $user ) {?>
                    <tr>
                    <td><?php echo $user['id_user']?></td>
                    <td><?php echo $user['pseudo_user']?></td>
                    <td><?php echo $user['mail_user']?></td>
                    <td><?php echo $user['name_role']?></td>
                    <td><select class='form-select form-role' aria-label='Default select example'>
                            <option selected>Choisir un rôle</option>
                            <option value='1'>Admin</option>
                            <option value='2'>User</option>
                        </select>
                    </td>
                    <td><button class='btn'><i class='bi bi-trash-fill'></i></button></td>
                    </tr>
                <?php }?>
            </table>
        </fieldset>

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
        </form>
        </fieldset>

    
    </div>
