
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
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                makeRequest(id);
                return;
            }
            alert('xd')
        });
    });
}

