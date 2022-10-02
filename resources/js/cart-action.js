function makeRequest(Method,Url,Id='') {
    $.ajax({
        method:Method,
        url: Url+Id,
    }).done(function (response) {
       if(Method == "GET"){
           return response;
       }
    });
}

$('.delete-button').click(function(){

});


$(function () { $wal.fire({
    title: "Sukces",
    text:"Czy napewno chcesz usunąc ten produkt z koszyka",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: 'Tak',
    cancelButtonText: 'Nie',
}).then((result)=>{
    if(result.isConfirmed){
        window.location.href="/cart/list"
    }
    return;
})
