// Sélectionne tous les boutons de suppression d'utilisateur avec la classe CSS 'delete-user'
const deleteButtons = document.querySelectorAll('.delete-user');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        
        // Récupère l'identifiant de l'utilisateur à supprimer à partir de l'attribut 'data-user-id' du bouton
        const userId = parseInt(button.getAttribute('data-user-id'));
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
function deleteComment(commentId) {
  if (confirm("Êtes-vous sûr de vouloir supprimer ce commentaire ?")) {
      let xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
              if (xhr.status === 200) {
                  // Suppression réussie
                  alert(xhr.responseText);
                  // Actualiser la page ou effectuer d'autres actions nécessaires
                  location.reload();
              } else {
                  // Erreur lors de la suppression
                  alert("Erreur lors de la suppression du commentaire. Veuillez réessayer.");
              }
          }
      };

      xhr.open("POST", "delete_comment.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("commentId=" + commentId);
  }
}




