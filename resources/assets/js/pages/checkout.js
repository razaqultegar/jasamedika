"use strict";

var Checkout = (function () {
    // Globals
    var form, submitButton;

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
                            location.href = "/riwayat";
                        }, 1500);
                    }
                })
                .catch(function (error) {
                    const dataErrors = error.response?.data?.errors || {};
                    let dataMessage = "";

                    Object.keys(dataErrors).forEach((key) => {
                        if (dataErrors.hasOwnProperty(key)) {
                            dataMessage += `\r\n${dataErrors[key]}, silahkan coba lagi`;
                        }
                    });

                    showFlashMessage(dataMessage);
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
            submitButton = form.querySelector("button[type=submit]");

            handleForm();
        },
    };
})();

document.addEventListener("DOMContentLoaded", Checkout.init);
