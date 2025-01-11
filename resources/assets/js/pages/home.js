"use strict";

var Home = (function () {
    // Init forms
    var initForm = function () {
        // Init flatpickr
        $("#datepicker").flatpickr({
            locale: "id",
            mode: "range",
            minDate: "today",
            altInput: true,
            altFormat: "l, j F Y",
            dateFormat: "Y-m-d",
        });
    };

    // Handle forms
    var handleForm = function () {
        // Add form handling logic here
    };

    return {
        init: function () {
            initForm();
            handleForm();
        },
    };
})();

$(document).ready(function () {
    Home.init();
});
