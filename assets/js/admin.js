// Select all user deletion buttons with the CSS class 'delete-user'
const deleteButtons = document.querySelectorAll('.delete-user');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {        
       // Get the user ID to be deleted from the 'data-user-id' attribute of the button
        const userId = parseInt(button.getAttribute('data-user-id'));
       // Display a confirmation dialog box to ask the user if they are sure they want to delete this user
        const confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
        if (confirmDelete) {
             // Send an AJAX request to delete the user       
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




