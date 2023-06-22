// Sélectionne tous les boutons de suppression d'utilisateur avec la classe CSS 'delete-user'
const deleteButtons = document.querySelectorAll('.delete-user');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        
        // Récupère l'identifiant de l'utilisateur à supprimer à partir de l'attribut 'data-user-id' du bouton
        const userId = parseInt(button.getAttribute('data-user-id'));
        console.log(userId)
        // Affiche une boîte de dialogue de confirmation pour demander à l'utilisateur s'il est sûr de vouloir supprimer cet utilisateur
        const confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
        if (confirmDelete) {
            // Envoie une requête AJAX pour supprimer l'utilisateur
            // deleteUserAjax(userId);
            $.ajax({
                type: "POST",
                url: "../controller/admin.php",
                data : {
                    "idUser" : userId
                },                       
            });
            location.reload();
        }
    })
});

const buttonsInscription = document.querySelectorAll('.boutonInfo');

buttonsInscription.forEach(function(buttonInscription) {
  buttonInscription.addEventListener("mouseenter", function() {
    let parent = buttonInscription.parentNode;
    let info = parent.querySelector('.infoInscription');
    info.style.display = "block";
  });

  buttonInscription.addEventListener("mouseleave", function() {
    let parent = buttonInscription.parentNode;
    let info = parent.querySelector('.infoInscription');
    info.style.display = "none";
  });
});

// const buttonsInscription = document.querySelectorAll('.boutonInfo');
// buttonsInscription.forEach(function(buttonInscription){
//     buttonInscription.addEventListener("mouseenter", function(){
//         let info = document.querySelector('.infoInscription');
//         info.style.display="block";
//     });
    
//     buttonInscription.addEventListener("mouseout", function(){
//         let info = document.querySelector('.infoInscription');
//         info.style.display="none";
//     });
// })


