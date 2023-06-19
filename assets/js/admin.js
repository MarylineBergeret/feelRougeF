// Sélectionne tous les boutons de suppression d'utilisateur avec la classe CSS 'delete-user'
const deleteButtons = document.querySelectorAll('.delete-user');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Récupère l'identifiant de l'utilisateur à supprimer à partir de l'attribut 'data-user-id' du bouton
        const userId = button.getAttribute('data-user-id');
        // Affiche une boîte de dialogue de confirmation pour demander à l'utilisateur s'il est sûr de vouloir supprimer cet utilisateur
        const confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
        if (confirmDelete) {
            // Envoie une requête AJAX pour supprimer l'utilisateur
            deleteUserAjax(userId);
        }
    })
});
// Fonction pour envoyer une requête AJAX pour supprimer l'utilisateur
function deleteUserAjax(userId) {
    fetch('delete_user.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ userId: userId })
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        // Gère la réponse du serveur
        alert(data.message);
    })
    .catch(function(error) {
        console.error('Erreur:', error);
        // Gère les erreurs survenues lors de la requête
    })
}


