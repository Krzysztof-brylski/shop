function setEventListener() {
    $('button.add-cart-button').unbind();
    $('button.add-cart-button').click(function () {
        add_to_cart($(this).data("id"));
    });
}
export function add_to_cart(product_id) {
    $.ajax({
        method:"POST",
        url: cart+product_id,
    }).done(function () {
        $(function () { $wal.fire({
            title: "Success",
            text:"Product has been added to the cart",
            icon: "success",
            showCancelButton: true,
            confirmButtonText: 'To Shopping Cart',
            cancelButtonText: 'Continue Shopping',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href="/cart/list"
            }
            return;
        })
    })
    })
}
setEventListener();
