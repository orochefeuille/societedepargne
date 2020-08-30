// ********* Create new banking accounts on newaccount.html **********

 // Get the old accounts in "accounts.json" file
httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function() {
    if(httpRequest.readyState === XMLHttpRequest.DONE) {
        if(httpRequest.status === 200) {
            let response = httpRequest.responseText;
            accounts = JSON.parse(response);
            createAccountObject(accounts);
        } else {
            console.log("Une erreur est survenue !");
        }
    } else {
        console.log("En attente de réponse");
    }
};
httpRequest.open('POST', '../doc/accounts.json', true);
httpRequest.send();

function createAccountObject(accounts) {
     /* TODO : Eclater cette fonction en plusieurs */
    const selectorOptions = document.querySelectorAll("#accounts-list option");
    const inputNumber = document.getElementById("account-amount");
    const amountHelp = document.getElementById("amountHelp");
    const createBtn = document.getElementById("create-account");
    const confirmCard = document.getElementById("confirm-card");
    const confirmCardtext = document.querySelector("#confirm-card p");
    const cancelBtn = document.getElementById("cancel-account");
    const confirmBtn = document.getElementById("confirm-account");
    const createDone = document.getElementById("done");

    let accountTitle = selectorOptions[0].value;
    let accountText = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et erat eget purus egestas euismod.";
    let amount = "";
    let oldAccountTitle = []
    let accountEntries = {};


    for(let account of accounts){
        oldAccountTitle.push(account["title"]);
    }

    for(option of selectorOptions) {
        if(oldAccountTitle.includes(option.innerText)) {
            option.style.display = 'none';
        }
        option.addEventListener("click", function(){
            accountTitle = this.value;
        });
        selectorOptions[0].removeEventListener("click", function(){
             accountTitle = this.value;
        });
    }

    createBtn.addEventListener("click", function(){
        const selector = document.getElementById("accounts-list");
        if(inputNumber.value > 50 && accountTitle !== "-- Choisir --") {
            amountHelp.classList.remove("text-danger");
            amountHelp.classList.add("text-success");
            amount = inputNumber.value;
            selector.classList.remove("border-danger");
            confirmCard.style.opacity = "1";
            confirmCard.style.transition = "opacity 1s linear";
            this.setAttribute("disabled", "true");
            confirmCardtext.innerText = `Confirmez la création d'un ${accountTitle} accrédité de ${amount} €.`
        }
        else if(inputNumber.value < 50){
            amountHelp.classList.remove("text-success");
            amountHelp.classList.add("text-danger");
        }
        else {
            selector.classList.add("border-danger");
        }
    });

    cancelBtn.addEventListener("click", function(){
        amountHelp.classList.remove("text-success");
        amountHelp.classList.add("text-orange");
        createBtn.removeAttribute("disabled");
        confirmCard.style.opacity = "0";
        confirmCard.style.transition = "opacity 1s linear";
    });

    confirmBtn.addEventListener("click", function(){
        confirmCard.style.opacity = "0";
        confirmCard.style.transition = "opacity 1s linear";
        createDone.style.opacity = "1";
        createDone.style.transition = "opacity 0.3s linear";
        setTimeout(function(){ 
            createDone.style.opacity = "0";
            createBtn.removeAttribute("disabled");
        }, 3000);
        accountEntries = {
            "title": accountTitle,
            "text": accountText,
            "balance": amount
        }

    // Post the new account in "accounts.json" file
        // httpRequest = new XMLHttpRequest();
        // httpRequest.onreadystatechange = function() {
        //     if(httpRequest.readyState === XMLHttpRequest.DONE) {
        //         if(httpRequest.status === 200) {
        //             let response = httpRequest.responseText;
        //             accounts = JSON.parse(response);
        //             accounts.push(accountEntries);
        //             JSON.stringify(accounts);
        //             console.log(JSON.stringify(accounts));
        //         } else {
        //             console.log("Une erreur est survenue !");
        //         }
        //     } else {
        //         console.log("En attente de réponse");
        //     }
        // };
        // httpRequest.open('POST', '../doc/accounts.json', true);
        // httpRequest.send();
    });
 }