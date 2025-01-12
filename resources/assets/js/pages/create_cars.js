"use strict";

var CreateCars = (function () {
    // Globals
    var form, plate, merk, model, price, submitButton;

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
    var validateInput = function (element, validator, message) {
        var value = element.value;

        if (value === "" || (element === price && parseFloat(value.replace(/[^0-9.]/g, "")) <= 0)) {
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
        var isValid = [plate, merk, model, price].every(function (element) {
            return element.value !== "" && !element.classList.contains("is-invalid");
        });

        if (isValid) {
            submitButton.removeAttribute("disabled");
        } else {
            submitButton.setAttribute("disabled", "disabled");
        }
    };

    // Init forms
    var initForm = function () {
        // Initialize inputmask
        Inputmask({
            alias: "currency",
            prefix: "Rp",
            groupSeparator: ".",
            radixPoint: ",",
            autoGroup: true,
            digits: 0,
            digitsOptional: false,
            allowMinus: false,
            rightAlign: false,
            removeMaskOnSubmit: true
        }).mask(price);

        plate.addEventListener("input", function (e) {
            e.preventDefault();

            var platePattern = /^[A-Z]{1,2} \d{1,4} [A-Z]{1,3}$/;

            validateInput(plate, platePattern, {
                empty: "Nomor polisi harus diisi",
                invalid: "Format nomor polisi tidak valid (contoh: A 1234 BC)",
            });
        });

        merk.addEventListener("change", function (e) {
            e.preventDefault();
            validateInput(merk, null, { empty: "Merk harus dipilih" });
        });

        model.addEventListener("input", function (e) {
            e.preventDefault();
            validateInput(model, null, { empty: "Model harus diisi" });
        });

        price.addEventListener("input", function (e) {
            e.preventDefault();
            validateInput(price, null, { empty: "Harga sewa harus diisi" });
        });
    };

    // Hanlde forms
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
            plate = form.querySelector("input[name=plate]");
            merk = form.querySelector("select[name=merk]");
            model = form.querySelector("input[name=model]");
            price = form.querySelector("input[name=price]");
            submitButton = form.querySelector("button[type=submit]");

            initForm();
            handleForm();
        },
    };
})();

$(document).ready(function () {
    CreateCars.init();
});
