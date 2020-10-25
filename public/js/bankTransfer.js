const cancelBtn = document.getElementById("cancel-transfer");
const validateBtn = document.getElementById("transfer_button");
const confirmBtn = document.getElementById("confirm-transfer");
const transferCard = document.getElementById("transfer-card");
const accountsListCredit = document.getElementById("accounts-list-credit");
const accountsListDebit = document.getElementById("accounts-list-debit");
const transferAmount = document.getElementById("transfer-amount");
let cardText = document.querySelector(".card-text");


function confirmTransfer() {
    if(!accountsListCredit.value){
        accountsListCredit.style.border = "1px solid red";
    }
    else if(!accountsListDebit.value) {
        accountsListDebit.style.border = "1px solid red";
    }
    else if(transferAmount.value <= 0) {
        return;
    }
    else {
        transferCard.style.opacity = "1";
        accountsListCredit.style.border = "1px solid #ced4da";
        accountsListDebit.style.border = "1px solid #ced4da";
        cardText.innerHTML = 
            `Confirmez le virement de 
            <span class="text-info"> ${transferAmount.value} €</span>
            à partir du <span class="text-info">${accountsListDebit.value}</span>
            vers le <span class="text-info">${accountsListCredit.value}</span>
            `;
    }
}


validateBtn.addEventListener("click", confirmTransfer);
accountsListDebit.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        confirmAccountCreation();
    }
});
accountsListCredit.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        confirmAccountCreation();
    }
});
transferAmount.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        confirmAccountCreation();
    }
});

cancelBtn.addEventListener("click", function(){
    transferCard.style.opacity = "0";
});