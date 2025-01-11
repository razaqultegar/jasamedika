"use strict";

var SignUp = (function () {
    // Globals
    var name, phone, password, visibility, submitButton;

    // Show error message
    var showError = function (element, message) {
        var parentDiv = element.closest(".form-floating");
        var errorMessage = parentDiv.nextElementSibling;

        element.classList.add("is-invalid");

        if (!errorMessage || !errorMessage.classList.contains("invalid-feedback")) {
            errorMessage = document.createElement("div");
            errorMessage.className = "invalid-feedback";
            parentDiv.insertAdjacentElement("afterend", errorMessage);
        }

        errorMessage.innerText = message;
    };

    // Remove error message
    var removeError = function (element) {
        element.classList.remove("is-invalid");
        element.classList.add("valid");

        var parentDiv = element.closest(".form-floating");
        var errorElement = parentDiv.nextElementSibling;

        if (errorElement && errorElement.classList.contains("invalid-feedback")) {
            errorElement.remove();
        }
    };

    // Validate input
    var validateInput = function (element, validator, message) {
        var value = element.value;

        if (value === "") {
            showError(element, message.empty);
        } else if (validator && !validator.test(value)) {
            showError(element, message.invalid);
        } else {
            removeError(element);
        }

        checkFormValidity();
    };

    // Validate name
    var validateName = function () {
        validateInput(name, null, { empty: "Nama lengkap tidak boleh kosong." });
    };

    // Validate phone
    var validatePhone = function () {
        var phonePattern = /^[0-9]{10,15}$/;
        validateInput(phone, phonePattern, {
            empty: "Nomor telepon atau whatsapp tidak boleh kosong.",
            invalid: "Hanya diisi dengan nomor telepon atau whatsapp yang valid.",
        });
    };

    // Validate password
    var validatePassword = function () {
        validateInput(password, null, { empty: "Kata sandi tidak boleh kosong." });
    };

    // Check form validity
    var checkFormValidity = function () {
        if (name.classList.contains("valid") && phone.classList.contains("valid") && password.classList.contains("valid")) {
            submitButton.removeAttribute("disabled");
            submitButton.classList.remove("pointer-events-none", "cursor-not-allowed", "text-clrSubText", "bg-coal");
            submitButton.classList.add("text-white", "bg-clrPrimary");
        } else {
            submitButton.setAttribute("disabled", "disabled");
            submitButton.classList.add("pointer-events-none", "cursor-not-allowed", "text-clrSubText", "bg-coal");
            submitButton.classList.remove("text-white", "bg-clrPrimary");
        }
    };

    // Toggle password visibility
    var toggleVisibility = function () {
        var eyeIcon = document.getElementById("eye");
        var eyeOffIcon = document.getElementById("eye-off");

        if (password.type === "password") {
            password.type = "text";
            eyeIcon.classList.add("hidden");
            eyeOffIcon.classList.remove("hidden");
        } else {
            password.type = "password";
            eyeIcon.classList.remove("hidden");
            eyeOffIcon.classList.add("hidden");
        }
    };

    // Init forms
    var initForm = function () {
        name.addEventListener("input", validateName);
        phone.addEventListener("input", validatePhone);
        password.addEventListener("input", validatePassword);
        visibility.addEventListener("click", toggleVisibility);
    };

    return {
        init: function () {
            name = document.querySelector("input[name=name]");
            phone = document.querySelector("input[name=phone]");
            password = document.querySelector("input[name=password]");
            visibility = document.getElementById("visibility");
            submitButton = document.querySelector("button[type=submit]");

            initForm();
        },
    };
})();

$(document).ready(function () {
    SignUp.init();
});
