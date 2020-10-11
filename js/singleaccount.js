let creditBtn = document.getElementById("credit-btn");
let deditBtn = document.getElementById("dedit-btn");
let cancelBtn = document.getElementById("cancel-transaction");
let validateBtn = document.getElementById("validate-transaction");
let singleForm = document.getElementById("single-form");
let deleteBtn = document.getElementById("delete-btn");

creditBtn.addEventListener("click", function() {
    singleForm.classList.remove("opacity-0");
    deditBtn.classList.add("opacity-0");
    deleteBtn.classList.add("opacity-0");
    validateBtn.setAttribute("name", "validate-credit");
});

deditBtn.addEventListener("click", function() {
    singleForm.classList.remove("opacity-0");
    creditBtn.classList.add("opacity-0");
    deleteBtn.classList.add("opacity-0");
    validateBtn.setAttribute("name", "validate-debit");
});

cancelBtn.addEventListener("click", function() {
    singleForm.classList.add("opacity-0");
    creditBtn.classList.remove("opacity-0");
    deditBtn.classList.remove("opacity-0");
    deleteBtn.classList.remove("opacity-0");
    validateBtn.setAttribute("name", "");
});

validateBtn.addEventListener("click", function() {
    singleForm.classList.add("opacity-0");
    creditBtn.classList.remove("opacity-0");
    deditBtn.classList.remove("opacity-0");
    deleteBtn.classList.remove("opacity-0");
});


