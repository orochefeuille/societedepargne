// ********* Banking information on statistics.html **********

// Get the "savingsrate.json" file
httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function() {
    if(httpRequest.readyState === XMLHttpRequest.DONE) {
        if(httpRequest.status === 200) {
            let securityAdvice = JSON.parse(httpRequest.responseText);
            createTable(securityAdvice);

        } else {
            console.log("Une erreur est survenue !");
        }
    } else {
        console.log("En attente de réponse");
    }
};
 //Préparation et lancement de la requête
 httpRequest.open('GET', '../doc/savingsrate.json', true);
 httpRequest.send();

 // Create DOM elements from "savingsrate.json" file
 function createTable(file) {
     const tableHead = document.querySelector("table thead");
     const tableBody = document.querySelector("table tbody");
     const tableRowTh = document.createElement("tr");
     /* table head */
     for (key in file[0]) {
        let tableHeadTh = document.createElement("th");
        tableHeadTh.setAttribute("scope", "col");
        tableHeadTh.innerText = key;
        tableRowTh.appendChild(tableHeadTh);
     }
     tableHead.appendChild(tableRowTh);
     /* table body */
     for (product of file) {
        let tableRowTb = document.createElement("tr");
        for(key in product) {
            let tableBodyTd = document.createElement("td");
            tableBodyTd.innerText = product[key];
            tableRowTb.appendChild(tableBodyTd);
            tableBody.appendChild(tableRowTb);
        }
     }
 }