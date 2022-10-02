$(function () {
    console.log('xd');
    $('button.add-cart-button').click(function () {

        add_to_cart($(this).data("id"))
    });

});

function add_to_cart(product_id) {
    $.ajax({
        method:"POST",
        url: cart+product_id,
    }).done(function () {
        $(function () { $wal.fire({
            title: "Sukces",
            text:"Produkt Został dodany do koszyka",
            icon: "success",
            showCancelButton: true,
            confirmButtonText: 'Przejdź do koszyka',
            cancelButtonText: 'Kontynułuj zakupy',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href="/cart/list"
            }
            return;
        })
    })
    })
}
