"use strict";

var Cars = (function () {
    // Globals
    var modals;

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
            modals = document.querySelectorAll("[data-toggle=modal]");

            initModal();
        },
    };
})();

document.addEventListener("DOMContentLoaded", Cars.init);
