
function updateQuantity(index)
{
    var product_id = document.getElementById('product_id_'+index).value;
    var new_quantity = document.getElementById('quantity_'+index).value;

    let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
        async: false, 
        type:'POST',
        url:'/ajax-update-product-quantity' ,
        dataType:"json",
        data:{
            _token: _token,
            product_id: product_id,
            quantity: new_quantity,
        },
        success:function(){
            Swal.fire({
                icon: 'success',
                title: 'Quantity Update Successful',
                showConfirmButton: false,
                timer: 1500
            })
        },
    });
}
