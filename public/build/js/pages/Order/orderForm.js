var shape_price = 0;
var flavour_price = 0;
var cream_price = 0;
var size_price = 0;
var tier_price = 0;
var deco_price = 0;
var deli_price = 0;
var price = 0;
var deposit = 0;

$(document).ready(function () {

    shape_price = $('input[id=cake_shape]:checked').data('price');

    flavour_price = $('input[id=cake_flavour]:checked').data('price');

    cream_price = $('input[id=cake_cream]:checked').data('price');

    size_price = $('input[id=cake_size]:checked').data('price');

    tier_price = $('input[id=cake_tier]:checked').data('price');

    deco_price = $('input[id=cake_deco]:checked').data('price');

    deli_price = $('#deli_postcode').find('option:selected').data('price');

    calcEstimatedPrice();
});

$(document).on("change", "#cake_shape", function(){

    shape_price = $('input[id=cake_shape]:checked').data('price');

    calcEstimatedPrice();

});

$(document).on("change", "#cake_flavour", function(){

    flavour_price = $('input[id=cake_flavour]:checked').data('price');

    calcEstimatedPrice();

});

$(document).on("change", "#cake_cream", function(){

    cream_price = $('input[id=cake_cream]:checked').data('price');

    calcEstimatedPrice();

});

$(document).on("change", "#cake_size", function(){

    size_price = $('input[id=cake_size]:checked').data('price');

    calcEstimatedPrice();

});

$(document).on("change", "#cake_tier", function(){

    tier_price = $('input[id=cake_tier]:checked').data('price');

    calcEstimatedPrice();

});

$(document).on("change", "#cake_deco", function(){

    deco_price = $('input[id=cake_deco]:checked').data('price');

    calcEstimatedPrice();

});

$(document).on("change", "#deli_postcode", function(){

    deli_price = $('#deli_postcode').find('option:selected').data('price');

    calcEstimatedPrice();

});

function calcEstimatedPrice() {

price = shape_price + flavour_price + cream_price + (size_price*tier_price) + deco_price + deli_price;

deposit = price/2;

// total price and display total price
total_price = document.getElementById('total_price');

total_price.value = price;

display_price = document.getElementById('display_price');

display_price.innerHTML = "Total Price : RM <b>"+ price +"</b>";

// deposit price and display deposit price
deposit_price = document.getElementById('deposit_price');

deposit_price.value = deposit;

display_deposit = document.getElementById('display_deposit');

display_deposit.innerHTML = "Deposit Price : RM <b>"+ deposit +"</b>";

}
