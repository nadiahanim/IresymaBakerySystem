$(document).ready(function () {

    var auto = document.getElementById("auto_operation");
    var manual = document.getElementById("manual_operation");

    if($('#square-switch1').is(':checked'))
    {
        auto.style.visibility = "block";
        manual.style.display = "none";
    }
    else
    {
        auto.style.display = "none";
        manual.style.display = "block";
    }

});

$('#square-switch1').on('change', function(e, state) {

    var auto_operation = document.getElementById("auto_operation");
    var manual_operation = document.getElementById("manual_operation");

    if($('#square-switch1').is(':checked'))
    {
        auto_operation.style.display = "block";
        manual_operation.style.display = "none";
    }
    else
    {
        auto_operation.style.display = "none";
        manual_operation.style.display = "block";
    }
  });