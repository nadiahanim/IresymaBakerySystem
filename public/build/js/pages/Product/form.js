$(document).ready(function () {

    triggerProductImage();

});

function triggerProductImage(){
    $('#product_img').change(function () {
        var i = $(this).prev('label').clone();
        var file = $('#product_img')[0].files[0].name;
        $(this).prev('label').text(file);
        
    }); 
}

function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}