  <div class="row1">
      <div class="col-sm-12">
          <h1 class="text-center">FORMULAIRE<br class="d-sm-none"> DE CONTACT</h1>
      </div>
  </div>

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
            <textarea id="textAForm" name="textarea" rows="4" cols="35" placeholder="Je vous écoute"></textarea>
            <br>
          </tr>
          <tr>
            <td><button type="submit" name="submit"  id="buttonForm">ENVOYER</button></td>
          </tr>  
        </table>
      </form>      
    </div>
    <?php if (isset($status)): ?>
      <p id="contactSend"><?php echo $status; ?></p>
    <?php endif; ?>   
    <div class="faqh1"><h1>FAQ</h1></div>
    <div class="fond3">
    <img src="https://media.giphy.com/media/QTi3uyWcyJxeAAeTNB/giphy.gif" alt="flèches">
  </div>
  <div class="fond2-container">
    <div class="fond2">
      <div class="row">
        <div class="col text-center">
          <img src="../assets/image/faq.png" alt="Foire aux questions" id="logFaq">
        </div>
      </div><!--row-->   
      <div class="row">
        <div class="col" id="textFaq"> 
          <p><span class="question">1- Question :</span> Pourquoi?<br>
          <span class="response">Réponse :</span> Mais Parce QUE</p><br>
          <p><span class="question">2- Question :</span> Pourquoi devrais-je choisir ce site pour trouver des festivals de métal en Europe ?<br>
          <span class="response">Réponse :</span> Parce que nous avons rassemblé les meilleurs festivals de métal européens au même endroit ! Vous n'aurez plus besoin de chercher ailleurs.</p><br>
          <p><span class="question">3- Question :</span> Est-ce que ce site couvre tous les sous-genres de métal ?<br>
          <span class="response">Réponse :</span> Absolument pas! Pas le temps de parler de tous!!!</p><br>
          <p><span class="question">4- Question :</span> Quels sont les critères pris en compte pour évaluer les festivals ?<br>
          <span class="response">Réponse :</span> En fonction de la qualité des groupes présents, de l'atmosphère, des infrastructures, de l'accessibilité, et bien sûr, du kiff et des vibrations !</p><br>
          <p><span class="question">5- Question :</span> Comment puis-je acheter des billets pour les festivals recommandés ?<br>
          <span class="response">Réponse :</span> Liens directs vers les sites pour chaque festival. Il vous suffit de cliquer sur le lien et de suivre les instructions pour acheter vos billets en ligne.</p><br>
          <p><span class="question">6- Question :</span> Est-ce que ce site est régulièrement mis à jour avec de nouveaux festivals ?<br>
          <span class="response">Réponse :</span> Absolument ! Chaque année afin de garder notre liste de festivals à jour en ajoutant de nouvelles recommandations régulièrement. Revenez souvent pour découvrir les dernières nouveautés !</p><br>
        </div>
      </div><!--row-->   
      <div class="row">
        <div class="col text-center">
          <img src="../assets/image/fosse.png" alt="Image Foule">
        </div>
      </div><!--row-->   
    </div><!--fond2 -->
  </div> 