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

// // Close the security alert for all the session
// const close = document.querySelector(".close-layer");
// const layer = document.getElementById("layer");


// if(sessionStorage.getItem("security")) {
//     layer.style.display = "none";
// }

// function closeAlert(){
//     layer.style.display = "none";
//     sessionStorage.setItem("security", true);
// };

// close.addEventListener("click", closeAlert);