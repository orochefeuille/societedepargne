// Close the security alert for all the session
const close = document.querySelector(".close-layer");
const layer = document.getElementById("layer");


if(sessionStorage.getItem("security")) {
    layer.style.display = "none";
}

function closeAlert(){
    layer.style.display = "none";
    sessionStorage.setItem("security", true);
};

close.addEventListener("click", closeAlert);
