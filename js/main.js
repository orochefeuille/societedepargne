// Close the security alert for all the session
const close = document.querySelector(".close-layer");
const layer = document.getElementById("layer");

function closeAlert(){
    layer.style.display = "none";
    sessionStorage.setItem("security", true);
};

close.addEventListener("click", closeAlert);

if(sessionStorage.getItem("security")) {
    layer.style.display = "none";
}