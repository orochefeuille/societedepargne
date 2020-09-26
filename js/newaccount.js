const createAccountBtn = document.getElementById("create-account");
const cancelBtn = document.getElementById("cancel-account");
const confirmBtn = document.getElementById("confirm-account");
const confirmCard = document.getElementById("confirm-card");
const confirmMsg = document.getElementById("done");
const accountAmount = document.getElementById("account-amount");
const accountsList = document.getElementById("accounts-list");
let cardText = document.querySelector(".card-text");

createAccountBtn.addEventListener("click", function(){
    if(!accountsList.value){
        accountsList.style.border = "1px solid red";
        
    }
    else if(accountAmount.value < 50) {
        return;
    }
    else {
        confirmCard.style.opacity = "1";
        accountsList.style.border = "1px solid #ced4da";
        cardText.innerHTML = 
            `Confirmez la création d'un 
            <span class="text-info">${accountsList.value}</span> pour 
            <span class="text-info"> ${accountAmount.value} €.<s/pan>`;
    }
})

cancelBtn.addEventListener("click", function(){
    confirmCard.style.opacity = "0";
})

confirmBtn.addEventListener("click", function(){
    confirmCard.style.opacity = "0";
    confirmMsg.style.opacity = "1";
})