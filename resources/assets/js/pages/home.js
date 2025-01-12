"use strict";

var Home = (function () {
    // Globals
    var datepicker, modals;

    // Init forms
    var initForm = function () {
        if (!datepicker) return;

        // Init flatpickr
        flatpickr(datepicker, {
            locale: "id",
            mode: "range",
            minDate: "today",
            altInput: true,
            altFormat: "l, j F Y",
            dateFormat: "Y-m-d",
        });
    };

    // Init Modal
    var initModal = function () {
        modals.forEach(function (trigger) {
            trigger.addEventListener("click", function (e) {
                e.preventDefault();

                var targetModalID = trigger.getAttribute("data-target");
                var targetModal = document.querySelector(targetModalID);
                var dismissButtons = targetModal.querySelectorAll("[data-dismiss=modal]");

                if (targetModal) {
                    var backdrop = document.createElement("div");
                    backdrop.className = "backdrop";
                    document.body.appendChild(backdrop);

                    targetModal.classList.add("show");

                    dismissButtons.forEach(function (button) {
                        button.addEventListener("click", function () {
                            targetModal.classList.remove("show");
                            backdrop.remove();
                        });
                    });
                }
            });
        });
    };

    return {
        init: function () {
            datepicker = document.getElementById("datepicker");
            modals = document.querySelectorAll("[data-toggle=modal]");

            initForm();
            initModal();
        },
    };
})();

document.addEventListener("DOMContentLoaded", Home.init);
