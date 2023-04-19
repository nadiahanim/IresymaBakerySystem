var shape_price = 0;
var flavour_price = 0;
var cream_price = 0;
var size_price = 0;
var tier_price = 0;
var deco_price = 0;
var price = 0;

$(document).ready(function () {

triggerProductImage();

var shape = $('#cake_shape').find('option:selected');
shape_price = shape.data('price');

var flavour = $('#cake_flavour').find('option:selected');
flavour_price = flavour.data('price');

var cream = $('#cake_cream').find('option:selected');
cream_price = cream.data('price');

var size = $('#cake_size').find('option:selected');
size_price = size.data('price');

var tier = $('#cake_tier').find('option:selected');
tier_price = tier.data('price');

var deco = $('#cake_deco').find('option:selected');
deco_price = deco.data('price');

calcEstimatedPrice();

});

$(document).on("change", "#cake_shape", function(){

var shape = $(this).find('option:selected');

shape_price = shape.data('price');

calcEstimatedPrice();

});

$(document).on("change", "#cake_flavour", function(){

var flavour = $(this).find('option:selected');

flavour_price = flavour.data('price');

calcEstimatedPrice();

});

$(document).on("change", "#cake_cream", function(){

var cream = $(this).find('option:selected');

cream_price = cream.data('price');

calcEstimatedPrice();

});

$(document).on("change", "#cake_size", function(){

var size = $(this).find('option:selected');

size_price = size.data('price');

calcEstimatedPrice();

});

$(document).on("change", "#cake_tier", function(){

var tier = $(this).find('option:selected');

tier_price = tier.data('price');

calcEstimatedPrice();

});

$(document).on("change", "#cake_deco", function(){

var deco = $(this).find('option:selected');

deco_price = deco.data('price');

calcEstimatedPrice();

});

function calcEstimatedPrice() {

price = shape_price + flavour_price + cream_price + (size_price*tier_price) + deco_price;

total_price = document.getElementById('total_price');

total_price.value = price;

}

function triggerProductImage(){
$('#cake_img').change(function () {
    var i = $(this).prev('label').clone();
    var file = $('#cake_img')[0].files[0].name;
    $(this).prev('label').text(file);
    
}); 
}

function preview() {
frame.src=URL.createObjectURL(event.target.files[0]);
}