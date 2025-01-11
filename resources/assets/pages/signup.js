"use strict";

var SignUp = (function () {
    // Globals
    var name, phone, password, visibility, submitButton;

    // Show error message
    var showError = function (element, message) {
        var parentDiv = element.closest(".form-floating");
        var errorMessage = parentDiv.nextElementSibling;

        element.classList.add("is-invalid");

        if (
            !errorMessage ||
            !errorMessage.classList.contains("invalid-feedback")
        ) {
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

        if (
            errorElement &&
            errorElement.classList.contains("invalid-feedback")
        ) {
            errorElement.remove();
        }
    };

    // Validate name
    var validateName = function () {
        var nameValue = name.value;

        if (nameValue === "") {
            showError(name, "Nama lengkap tidak boleh kosong.");
        } else {
            removeError(name);
        }

        checkFormValidity();
    };

    // Validate phone
    var validatePhone = function () {
        var phonePattern = /^[0-9]{10,15}$/;
        var phoneValue = phone.value;

        if (phoneValue === "") {
            showError(phone, "Nomor telepon atau whatsapp tidak boleh kosong.");
        } else if (!phonePattern.test(phoneValue)) {
            showError(
                phone,
                "Hanya diisi dengan nomor telepon atau whatsapp yang valid."
            );
        } else {
            removeError(phone);
        }

        checkFormValidity();
    };

    // Validate password
    var validatePassword = function () {
        var passwordValue = password.value;

        if (passwordValue === "") {
            showError(password, "Kata sandi tidak boleh kosong.");
        } else {
            removeError(password);
        }

        checkFormValidity();
    };

    // Check form validity
    var checkFormValidity = function () {
        if (
            phone.classList.contains("valid") &&
            password.classList.contains("valid")
        ) {
            submitButton.removeAttribute("disabled");
            submitButton.classList.remove(
                "pointer-events-none",
                "cursor-not-allowed",
                "text-clrSubText",
                "bg-coal"
            );
            submitButton.classList.add("text-white", "bg-clrPrimary");
        } else {
            submitButton.setAttribute("disabled", "disabled");
            submitButton.classList.add(
                "pointer-events-none",
                "cursor-not-allowed",
                "text-clrSubText",
                "bg-coal"
            );
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
