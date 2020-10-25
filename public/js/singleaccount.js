let creditBtn = document.getElementById("credit-btn");
let deditBtn = document.getElementById("dedit-btn");
let cancelBtn = document.getElementById("cancel-transaction");
let validateBtn = document.getElementById("validate-transaction");
let singleForm = document.getElementById("single-form");
let deleteBtn = document.getElementById("delete-btn");
let deleteForm = document.getElementById("delete-form");
let cancelDeleteBtn = document.getElementById("cancel-delete");

if(creditBtn !== null) {
    creditBtn.addEventListener("click", function() {
        singleForm.classList.remove("d-none");
        deditBtn.classList.add("d-none");
        deleteBtn.classList.add("d-none");
        validateBtn.setAttribute("value", "1");
    });
}

if(deditBtn !== null) {
    deditBtn.addEventListener("click", function() {
        singleForm.classList.remove("d-none");
        creditBtn.classList.add("d-none");
        deleteBtn.classList.add("d-none");
        validateBtn.setAttribute("value", "0");
    });
}

if(cancelBtn !== null) {
    cancelBtn.addEventListener("click", function() {
        singleForm.classList.add("d-none");
        creditBtn.classList.remove("d-none");
        deditBtn.classList.remove("d-none");
        deleteBtn.classList.remove("d-none");
        validateBtn.setAttribute("value", "");
    });
}

if(validateBtn !== null) {
    validateBtn.addEventListener("click", function() {
        singleForm.classList.add("d-none");
        creditBtn.classList.remove("d-none");
        deditBtn.classList.remove("d-none");
        deleteBtn.classList.remove("d-none");
    });
}

if(deleteBtn !== null) {
    deleteBtn.addEventListener("click", function() {
        creditBtn.classList.add("d-none");
        deditBtn.classList.add("d-none");
        deleteForm.classList.remove("d-none");
    });
}

if(cancelDeleteBtn !== null) {
    cancelDeleteBtn.addEventListener("click", function() {
        creditBtn.classList.remove("d-none");
        deditBtn.classList.remove("d-none");
        deleteForm.classList.add("d-none");
    });
}

