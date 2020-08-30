// ********* Security layer on index.html **********

// Get the "security.json" file
httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function() {
    if(httpRequest.readyState === XMLHttpRequest.DONE) {
        if(httpRequest.status === 200) {
            let securityAdvice = JSON.parse(httpRequest.responseText);
            createLayer(securityAdvice);

        } else {
            console.log("Une erreur est survenue !");
        }
    } else {
        console.log("En attente de réponse");
    }
};
 //Préparation et lancement de la requête
 httpRequest.open('GET', 'doc/security.json', true);
 httpRequest.send();

 // Create DOM elements from "security.json" file for the security layer
 function createLayer(file) {
     const layer = document.getElementById("layer");
     for(const key in file) {
        if(key === "title") {
            let layerTitle = document.createElement("h2");
            layerTitle.classList.add("text-center", "font-weight-bold", "mt-5", "mb-5");
            layerTitle.style.textDecoration = "underline";
            layerTitle.innerText = file[key];
            layer.appendChild(layerTitle);
        }
        if(key === "preamble") {
            let layerPreamble = document.createElement("p");
            layerPreamble.classList.add("m-5");
            layerPreamble.innerText = file[key];
            layer.appendChild(layerPreamble);
        }
        if(key === "advice") {
            let layerAdviceUl = document.createElement("ul");
            layerAdviceUl.classList.add("lead","list-unstyled","m-5");
            for(const tip of file[key]) {
                let layerAdviceLi = document.createElement("li");
                layerAdviceLi.innerText = '* ' + tip;
                layerAdviceLi.classList.add("m-3", "font-weight-bold");
                layerAdviceUl.appendChild(layerAdviceLi);
            }
            layer.appendChild(layerAdviceUl);
        }
        if(key === "conclusion") {
            let layerAdviceP = document.createElement("p");
            layerAdviceP.innerText = file[key];
            layerAdviceP.classList.add("lead", "mx-5", "text-info", "font-weight-bold", "bg-white", "p-3", "mb-5");
            // layerTitle.style.textDecoration = "underline";
            layer.appendChild(layerAdviceP);
        }
     }
 }


 /**********  Page accounts <=> accounts.json file *******/
 // **** Get data 
httpRequest2 = new XMLHttpRequest();
httpRequest2.onreadystatechange = function() {
    if(httpRequest2.readyState === XMLHttpRequest.DONE) {
        if(httpRequest2.status === 200) {
            let oldAccounts = JSON.parse(httpRequest2.responseText);
            createAccounts(oldAccounts);

        } else {
            console.log("Une erreur est survenue !");
        }
    } else {
        console.log("En attente de réponse");
    }
};
 httpRequest2.open('GET', 'doc/accounts.json', true);
 httpRequest2.send();

// Create DOM elements from "oc-jswebsrv.herokuapp.com/api" API
function createAccounts(accounts) {
    const articlesWrapper = document.getElementById("articless-wrapper");
    for (let account of accounts) {
        let article = document.createElement("article");
        article.classList.add("card", "m-2", "col-12", "col-md-4", "col-lg-3"); 
        let articleBody = document.createElement("div");
        articleBody.classList.add("card-body"); 
        let articleTitle = document.createElement("h3");
        articleTitle.classList.add("card-title", "h-25"); 
        let articleBodyParag = document.createElement("p");
        articleBodyParag.classList.add("card-text"); 
        let articleBodyParagBalance = document.createElement("p");
        articleBodyParagBalance.classList.add("card-text"); 
        let articleBodyBtn = document.createElement("a");
        articleBodyParagBalance.classList.add("btn", "btn-info", "w-100", "bg-orange", "border-0", "font-weight-bold"); 
        articleBodyBtn.setAttribute("href", "#");
        articleBodyBtn.innerText = "Gérer";
        for(key in account) {
            if(key === 'title') {
                articleTitle.innerText = account[key];
            }
            if(key === 'text') {
                articleBodyParag.innerText = account[key];
            }
            if(key === 'balance') {
                articleBodyParagBalance.innerHTML = `<small>Solde : </small>${account[key]} €`;
            }
        }

        articleBody.appendChild(articleTitle);
        articleBody.appendChild(articleBodyParag);
        articleBody.appendChild(articleBodyParagBalance);
        article.appendChild(articleBody);
        articlesWrapper.appendChild(article);
    }
}


 // Create articles from accounts.json
//  const sessionObj = [
//     {
//      "title": sessionStorage.getItem("accTitle"),
//      "text": sessionStorage.getItem("accText"),
//      "balance": sessionStorage.getItem("accAmount")
//     }
//  ]
//  createAccounts(sessionObj);
 
