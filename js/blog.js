// ********* Banking information on statistics.html **********

// Get the "savingsrate.json" file
httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function() {
    if(httpRequest.readyState === XMLHttpRequest.DONE) {
        if(httpRequest.status === 200) {
            let apiArticles = JSON.parse(httpRequest.responseText);
            createArticles(apiArticles);
        } else {
            console.log("Une erreur est survenue !");
        }
    } else {
        console.log("En attente de réponse");
    }
};
 //Préparation et lancement de la requête
 httpRequest.open('GET', 'https://oc-jswebsrv.herokuapp.com/api/articles', true);
 httpRequest.send();

 // Create DOM elements from "oc-jswebsrv.herokuapp.com/api" API
 function createArticles(api) {
    const mainSection = document.querySelector("main > section");
    const articlesWrapper = document.createElement("div");
    articlesWrapper.classList.add("d-flex", "justify-content-around", "flex-wrap");
    for (let paper of api) {
        let article = document.createElement("article");
        article.classList.add("card", "w-50", "m-3"); 
        let articleHeader = document.createElement("div");
        articleHeader.classList.add("card-header", "bg-dark", "text-white");
        let articleBody = document.createElement("div");
        articleBody.classList.add("card-body"); 
        let articleHeaderTitle = document.createElement("h3");
        articleHeaderTitle.classList.add("card-title"); 
        let articleBodyParag = document.createElement("p");
        articleBodyParag.classList.add("card-text"); 
        for(key in paper) {
            if(key === 'titre') {
                articleHeaderTitle.innerText = paper[key];
            }
            if(key === 'contenu') {
                articleBodyParag.innerText = paper[key];
            }
        }

        articleHeader.appendChild(articleHeaderTitle);
        articleBody.appendChild(articleBodyParag);
        article.appendChild(articleHeader);
        article.appendChild(articleBody);
        articlesWrapper.appendChild(article);
        mainSection.appendChild(articlesWrapper);

    }
 }