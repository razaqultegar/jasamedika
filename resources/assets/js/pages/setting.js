"use strict";

var EditAccount = (function () {
    // Globals
    var form, license, name, address, submitButton;

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
        if (license.classList.contains("valid") && name.classList.contains("valid") && address.classList.contains("valid")) {
            submitButton.removeAttribute("disabled");
        } else {
            submitButton.setAttribute("disabled", "disabled");
        }
    };

    // Init forms
    var initForm = function () {
        license.addEventListener("input", function (e) {
            e.preventDefault();
            validateInput(license, { empty: "Nomor sim harus diisi" });
        });
        name.addEventListener("input", function (e) {
            e.preventDefault();
            validateInput(name, { empty: "Nama lengkap harus diisi" });
        });
        address.addEventListener("input", function (e) {
            e.preventDefault();
            validateInput(address, { empty: "Alamat tinggal harus diisi" });
        });
    };

    var handleForm = function () {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();

            submitButton.setAttribute("data-indicator", "on");
            submitButton.disabled = true;

            axios
                .post(
                    submitButton.closest("form").getAttribute("action"),
                    new FormData(form)
                )
                .then(function (response) {
                    if (response.status == 201) {
                        var flashMessage = document.createElement("div");

                        flashMessage.className = "flash-message_wrapper";
                        flashMessage.innerHTML = '<div class="flash-message_content"><span class="flash-message_text">' + response.data.message + '</span></div>';

                        form.parentNode.insertBefore(flashMessage, form.nextSibling);

                        setTimeout(function () {
                            flashMessage.remove();
                            location.reload();
                        }, 1500);
                    }
                })
                .catch(function (error) {
                    let dataMessage = "";
                    let dataErrors = error.response.data.errors;

                    for (const errorsKey in dataErrors) {
                        if (dataErrors.hasOwnProperty(errorsKey)) {
                            dataMessage += "\r\n" + dataErrors[errorsKey] + ", silahkan coba lagi";
                        }
                    }

                    if (error.response) {
                        var flashMessage = document.createElement("div");

                        flashMessage.className = "flash-message_wrapper";
                        flashMessage.innerHTML = '<div class="flash-message_content"><span class="flash-message_text">' + dataMessage + '</span></div>';

                        form.parentNode.insertBefore(flashMessage, form.nextSibling);

                        setTimeout(function () {
                            flashMessage.remove();
                            location.reload();
                        }, 1500);
                    }
                });
        });
    };

    return {
        init: function () {
            form = document.querySelector("form");
            license = form.querySelector("input[name=license]");
            name = form.querySelector("input[name=name]");
            address = form.querySelector("textarea[name=address]");
            submitButton = form.querySelector("button[type=submit]");

            initForm();
            handleForm();
        },
    };
})();

$(document).ready(function () {
    EditAccount.init();
});
