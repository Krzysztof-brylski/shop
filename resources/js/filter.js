import {add_to_cart} from "./cart";

$(function () {
    //page limit event listener
    $('div.page_lim a').click(function (event) {
        event.preventDefault();
        $('a.page_current_lim').text($(this).first().text(),$('a.page_lim').text());
        GetProducts($(this).text(),$('a.current_order_selector').data('order'));
    });
    // order event listener

    $('div.order_selector a').click(function (event) {
        event.preventDefault();
        let order=$(this).data('order');

        $('a.current_order_selector').attr('order',order).data(order);
        $('a.current_order_selector').text($(this).text());
        GetProducts($('a.page_current_lim').first().text(),order);
    });
    // fiters event listener
    $('a.result_btn').click(function (event) {
        event.preventDefault();
        GetProducts( $('a.page_current_lim').first().text(),$('a.current_order_selector').data('order'));
    });
    setEventListener();
});



function GetProducts(paginate,order) {
    const data = $('form.sidebar-filter').serialize();
    $.ajax({
        method:"GET",
        url: '/',
        data:data
            + '&' +
            $.param({paginate:paginate})
            +'&'+
            $.param({order:order})
        ,
    }).done(function (response) {
        $('div#product_container').empty();
        $.each(response.data,function (key,product){

            $('div#product_container').append(draw_product(product));

        });

    }).done(function () {
        setEventListener();
    });
}
function draw_product(product) {
    return `
                     <div class="col-6 col-md-6 col-lg-4 mb-3">
                               <div class="card h-100 border-0">
                                <div class="card-img-top">
                                    ${displayIMG(product)}
                                </div>
                                <div class="card-body text-center">
                                    <h4 class="card-title">
                                         ${product.name}
                                    </h4>
                                      <a class="text-decoration-none" href="${product_url+product.id}">
                                            <h5 class="card-price medium">
                                                <i>PLN ${product.price}</i>
                                            </h5>
                                      </a>
                                      <button class="btn btn-success add-cart-button" data-id="${product.id}" >${addToCartBtn}</button>
                                </div>
                                
                            </div>        
                     </div>
            
            `;
}
function displayIMG(product){
    if(!!product.image){
        return `<img src="${asset + "/"+ product.image}" class="img-fluid mx-auto d-block" alt="Card image cap"`;
    }
    return `<img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">`;
}

function setEventListener() {
    $('button.add-cart-button').unbind();
    $('button.add-cart-button').click(function () {
        add_to_cart($(this).data("id"));
    });
}

