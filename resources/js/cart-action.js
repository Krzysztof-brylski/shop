
$('.dell-cart-item').click(function(){
    let id= $(this).data('cartitem_id');
    ask(id);

});

function makeRequest(Id) {
    $.ajax({
        method:"POST",
        url: DellFromCartURL+Id,
    }).done(function (response) {
        window.location.reload();
    }).fail(function (response) {
        console.log(data.responseJSON);
    });
}
function ask(id) {
    $(function () {
        $wal.fire({
            title: "Czy napewno chcesz usunąc ten produkt z koszyka",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Tak',
            cancelButtonText: 'Nie',
        }).then((result) => {
            if (result.isConfirmed) {
                makeRequest(id);
                return;
            }
            alert('xd')
        });
    });
}

