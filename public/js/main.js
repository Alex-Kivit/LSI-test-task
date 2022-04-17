$(document).ready(function () {
    $("#start-picker").datetimepicker({
        timepicker: false,
        datepicker: true,
        format: 'd-m-Y'
    });

    $("#end-picker").datetimepicker({
        timepicker: false,
        datepicker: true,
        format: 'd-m-Y'
    });
});