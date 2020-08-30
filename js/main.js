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


 /**********  Page accounts <=> oldaccounts.json file *******/
 // **** Get data 
httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function() {
    if(httpRequest.readyState === XMLHttpRequest.DONE) {
        if(httpRequest.status === 200) {
            let oldAccounts = JSON.parse(httpRequest.responseText);
            createAccounts(oldAccounts);

        } else {
            console.log("Une erreur est survenue !");
        }
    } else {
        console.log("En attente de réponse");
    }
};
 httpRequest.open('GET', 'doc/accounts.json', true);
 httpRequest.send();

 // Create articles from accounts.json
 function createAccounts(accounts) {

 }

 // **** Post data
httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function() {
    if(httpRequest.readyState === XMLHttpRequest.DONE) {
        if(httpRequest.status === 200) {
            let oldAccounts = JSON.parse(httpRequest.responseText);
            console.log(oldAccounts);

        } else {
            console.log("Une erreur est survenue !");
        }
    } else {
        console.log("En attente de réponse");
    }
};
 httpRequest.open('POST', 'doc/accounts.json', true);
 httpRequest.send();
