//  // ********* Articles on blog.html **********

// Get the "oc-jswebsrv.herokuapp api articles.json" file
httpRequest4 = new XMLHttpRequest();
httpRequest4.onreadystatechange = function() {
    if(httpRequest4.readyState === XMLHttpRequest.DONE) {
        if(httpRequest4.status === 200) {
            let apiArticles = JSON.parse(httpRequest4.responseText);
            createArticles(apiArticles);
        } else {
            console.log("Une erreur est survenue !");
        }
    } else {
        console.log("En attente de réponse");
    }
};
 //Préparation et lancement de la requête
 httpRequest4.open('GET', 'https://oc-jswebsrv.herokuapp.com/api/articles', true);
 httpRequest4.send();

 // Create DOM elements from "oc-jswebsrv.herokuapp.com/api" API
 function createArticles(api) {
    const mainSection = document.querySelector(".blog-wrapper");
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