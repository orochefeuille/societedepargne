const createAccountBtn = document.getElementById("create-account");
const cancelBtn = document.getElementById("cancel-account");
const confirmCard = document.getElementById("confirm-card");
const confirmBtn = document.getElementById("confirm-account");
const accountAmount = document.getElementById("balance");
const accountsList = document.getElementById("accounts-list");
let cardText = document.querySelector(".card-text");

function confirmAccountCreation() {
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
}

createAccountBtn.addEventListener("click", confirmAccountCreation);
accountsList.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        confirmAccountCreation();
    }
});
accountAmount.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        confirmAccountCreation();
    }
});

cancelBtn.addEventListener("click", function(){
    confirmCard.style.opacity = "0";
});

// confirmBtn.addEventListener("click", function(e){
//     e.preventDefault();
//     confirmCard.style.opacity = "0";
// });
