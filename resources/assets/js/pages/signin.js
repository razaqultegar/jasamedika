"use strict";

var SignIn = (function () {
    // Globals
    var phone, password, visibility, submitButton;

    // Show error message
    var showError = function (element, message) {
        var parentDiv = element.closest(".form-floating");
        var errorMessage = parentDiv.nextElementSibling;

        element.classList.remove("valid");
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

    // Check form validity
    var checkFormValidity = function () {
        var isValid = phone.classList.contains("valid") && password.classList.contains("valid");

        submitButton.disabled = !isValid;
        submitButton.classList.toggle("pointer-events-none", !isValid);
        submitButton.classList.toggle("cursor-not-allowed", !isValid);
        submitButton.classList.toggle("text-clrSubText", !isValid);
        submitButton.classList.toggle("bg-coal", !isValid);
        submitButton.classList.toggle("text-white", isValid);
        submitButton.classList.toggle("bg-clrPrimary", isValid);
    };

    // Init forms
    var initForm = function () {
        phone.addEventListener("input", function (e) {
            e.preventDefault();

            var phonePattern = /^[0-9]{10,15}$/;

            validateInput(phone, phonePattern, {
                empty: "Nomor telepon atau whatsapp tidak boleh kosong.",
                invalid: "Hanya diisi dengan nomor telepon atau whatsapp yang valid.",
            });
        });
        password.addEventListener("input", function (e) {
            e.preventDefault();
            validateInput(password, null, { empty: "Kata sandi tidak boleh kosong." });
        });
        visibility.addEventListener("click", function (e) {
            e.preventDefault();

            var eyeIcon = document.getElementById("eye");
            var eyeOffIcon = document.getElementById("eye-off");
            var isPasswordVisible = password.type === "password";

            password.type = isPasswordVisible ? "text" : "password";
            eyeIcon.classList.toggle("hidden", isPasswordVisible);
            eyeOffIcon.classList.toggle("hidden", !isPasswordVisible);
        });
    };

    return {
        init: function () {
            phone = document.querySelector("input[name=phone]");
            password = document.querySelector("input[name=password]");
            visibility = document.getElementById("visibility");
            submitButton = document.querySelector("button[type=submit]");

            initForm();
        },
    };
})();

$(document).ready(function () {
    SignIn.init();
});
