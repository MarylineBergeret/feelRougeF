    <h1>FORMULAIRE DE CONTACT</h1>
    <div id="formContact">
        
        <form id="formulaire" action="../controller/contact.php" method="POST">
        
            <table>
                <tr>
                    <td><label for="pseudo">Pseudo</label><br>
                    <input class="input-shadow" type="text" name="pseudo" placeholder="Entrez votre pseudo" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="mail">Mail</label><br>
                    <input class="input-shadow" type="email" name="mail" placeholder="saisir votre Email" required>
                    </td>
                </tr>
                
                <tr>
                
                    <td><label for="textarea">Votre demande</label><br>
                    <textarea name="textarea" rows="4" cols="50">Je vous écoute</textarea>
                    <br>
                </tr>
                <tr>
                    <td><button type="submit" name="submit"  id="buttonForm">ENVOYER</button></td>
                </tr>  
            </table>
        </form>   
    </div>