let creditBtn = document.getElementById("credit-btn");
let deditBtn = document.getElementById("dedit-btn");
let cancelBtn = document.getElementById("cancel-transaction");
let validateBtn = document.getElementById("validate-transaction");
let singleForm = document.getElementById("single-form");
let deleteBtn = document.getElementById("delete-btn");

creditBtn.addEventListener("click", function() {
    singleForm.classList.remove("d-none");
    deditBtn.classList.add("d-none");
    deleteBtn.classList.add("d-none");
    validateBtn.setAttribute("value", "1");
});

deditBtn.addEventListener("click", function() {
    singleForm.classList.remove("d-none");
    creditBtn.classList.add("d-none");
    deleteBtn.classList.add("d-none");
    validateBtn.setAttribute("value", "0");
});

cancelBtn.addEventListener("click", function() {
    singleForm.classList.add("d-none");
    creditBtn.classList.remove("d-none");
    deditBtn.classList.remove("d-none");
    deleteBtn.classList.remove("d-none");
    validateBtn.setAttribute("value", "");
});

validateBtn.addEventListener("click", function() {
    singleForm.classList.add("d-none");
    creditBtn.classList.remove("d-none");
    deditBtn.classList.remove("d-none");
    deleteBtn.classList.remove("d-none");
});


