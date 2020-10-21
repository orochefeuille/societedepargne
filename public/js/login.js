// Hide danger-alert when focusing on inputs
const dangerDiv = document.querySelector('.danger-div');
const mailInput = document.getElementById('email');
const pwdInput = document.getElementById('client-password');

mailInput.addEventListener('focusin', (e) => {
    if (dangerDiv){
        dangerDiv.style.opacity = "0"; 
    }
});
pwdInput.addEventListener('focusin', (e) => {
    if (dangerDiv){
        dangerDiv.style.opacity = "0"; 
    }
});
