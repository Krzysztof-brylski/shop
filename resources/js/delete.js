$('.delete-button').click(function(){
    const id = $(this).data("id");

    $(function () { $wal.fire({
        title: deleteMessage+" "+id,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Tak',
        cancelButtonText: 'Nie',
    }).then((result)=>{
        if(result.value){
            $.ajax({
                method:"DELETE",
                url: deleteUrl+'/'+ id,
            }).done(function () {
                window.location.reload();
            }).fail(function (data) {
                console.log(data.responseJSON);
                $wal.fire('Oops...',data.responseJSON.message, data.responseJSON.status);
            })
        }
    });
});

});
