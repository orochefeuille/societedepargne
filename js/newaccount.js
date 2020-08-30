// ********* Create new banking accounts on newaccount.html **********

// Get the "accounts.json" file
httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function() {
    if(httpRequest.readyState === XMLHttpRequest.DONE) {
        if(httpRequest.status === 200) {
            // let getAccounts = JSON.parse(httpRequest.responseText);
            // createArticles(apiArticles);
        } else {
            console.log("Une erreur est survenue !");
        }
    } else {
        console.log("En attente de réponse");
    }
};
 //Préparation et lancement de la requête
 httpRequest.open('GET', '../doc/accounts.json', true);
 httpRequest.send();