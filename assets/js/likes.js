   // gestion des likes / likes 
function like(elem, idFestival, idUser){
    // Récupération de l'élément <img> et de son attribut alt pour savoir si c'est un like ou un dislike
    // Retrieve the <img> element and its alt attribute to determine if it's a like or a dislike.
    let valueLike = elem.querySelector('img');
    let altimg = valueLike.alt;   
    // Récupération de l'élément précédent qui contient le nombre de likes
    // Retrieval of the previous element that contains the number of likes.
    let previousElem = elem.previousElementSibling;
    let numLikes = parseInt(previousElem.textContent);   
    
    // Si c'est un dislike, on transforme en like et on décrémente le nombre de likes (-1)
    // If it's a dislike, we convert it to a like and decrement the number of likes (-1).
    if(altimg == 'unlike'){
        valueLike.alt = 'like';
        valueLike.src="../assets/image/like.png";
        let newValue = numLikes-1;
        previousElem.innerText = newValue+(newValue > 1 ? ' likes' : ' like');
    }
    // Si c'est un like, on transforme en dislike et on incrémente le nombre de likes (+1)
    // If it's a like, we change it to a dislike and increment the number of likes by one.
    else{
        valueLike.alt = 'unlike';
        valueLike.src="../assets/image/unlike.png";
        let newValue = numLikes+1;
        previousElem.innerText = newValue+(newValue > 1 ? ' likes' : ' like');
    }    

    // Envoi de la requête AJAX pour enregistrer le like/dislike en base de données
    // Sending the AJAX request to save the like/dislike in the database.
    $.ajax({
        type: "POST",
        url: "../controller/festival.php",
        data : {
            likeIdFestival : idFestival,
            likeIdUser : idUser,
            
        }
    });
}







