"use strict";

var Home = (function () {
    // Globals
    var datepicker;

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

    return {
        init: function () {
            datepicker = document.getElementById("datepicker");
            initForm();
        },
    };
})();

document.addEventListener("DOMContentLoaded", Home.init);
