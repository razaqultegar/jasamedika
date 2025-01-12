"use strict";

var EditAccount = (function () {
    // Globals
    var form, name, submitButton;

    // Show error message
    var showError = function (element, message) {
        var parentDiv = element.closest("div");
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

        var parentDiv = element.closest("div");
        var errorElement = parentDiv.nextElementSibling;

        if (errorElement && errorElement.classList.contains("invalid-feedback")) {
            errorElement.remove();
        }
    };

    // Validate input
    var validateInput = function (element, message) {
        var value = element.value;

        if (value === "") {
            showError(element, message.empty);
        } else {
            removeError(element);
        }

        checkFormValidity();
    };

    // Check form validity
    var checkFormValidity = function () {
        if (name.classList.contains("is-invalid")) {
            submitButton.setAttribute("disabled", "disabled");
        } else {
            submitButton.removeAttribute("disabled");
        }
    };

    // Init forms
    var initForm = function () {
        name.addEventListener("input", function (e) {
            e.preventDefault();
            validateInput(name, { empty: "Nama lengkap harus diisi" });
        });
    };

    var handleForm = function () {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();

            submitButton.setAttribute("data-indicator", "on");
            submitButton.disabled = true;

            axios
                .post(submitButton.closest("form").getAttribute("action"), new FormData(form))
                .then(function (response) {
                    if (response.status == 201) {
                        showFlashMessage(response.data.message);
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    }
                })
                .catch(function (error) {
                    showFlashMessage(error.response.data.message);
                    setTimeout(function () {
                        location.reload();
                    }, 1500);
                });
        });
    };

    // Show flash message
    var showFlashMessage = function (message) {
        var flashMessage = document.createElement("div");

        flashMessage.className = "flash-message_wrapper";
        flashMessage.innerHTML = '<div class="flash-message_content"><span class="flash-message_text">' + message + '</span></div>';
        form.parentNode.insertBefore(flashMessage, form.nextSibling);

        setTimeout(function () {
            flashMessage.remove();
        }, 1500);
    };

    return {
        init: function () {
            form = document.querySelector("form");
            name = form.querySelector("input[name=name]");
            submitButton = form.querySelector("button[type=submit]");

            initForm();
            handleForm();
        },
    };
})();

document.addEventListener("DOMContentLoaded", EditAccount.init);
