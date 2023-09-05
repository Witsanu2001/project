var product;



$(document).ready(() => {

    $.ajax({
        method: 'get',
        url: './api/getallproduct.php',
        success: function(response) {
            console.log(response)
            if(response.RespCode == 200) {

                product = response.Result;

                var html = '';
                for (let i = 0; i < product.length; i++) {
                    html += `<div onclick="openProductDetail(${i})" class="product-items ${product[i].type}">
                                <img class="product-img" src="./imgs/${product[i].file_name}" alt="">
                                <p style="font-size: 1.2vw;">${product[i].m_name}</p>
                                <p stlye="font-size: 1vw;">${ numberWithCommas(product[i].m_price) } บาท</p>
                            </div>`;
                }
                $("#productlist").html(html);
            }
        }, error: function(err) {
            console.log(err)
        }
    })
})

function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}


var productindex = 0;
function openProductDetail(index) {
    productindex = index;
    console.log(productindex)
    $("#modalDesc").css('display', 'flex')
    $("#mdd-img").attr('src', './imgs/' + product[index].file_name);
    $("#mdd-name").text(product[index].m_name)
    $("#mdd-price").text( numberWithCommas(product[index].m_price) + ' บาท')
    $("#mdd-desc").text(product[index].m_description)
}

function closeModal() {
    $(".modal").css('display','none')
}

function rendercart() {
    if(cart.length > 0) {
        var html = '';
        for (let i = 0; i < cart.length; i++) {
            html += `<div class="cartlist-items">
                        <div class="cartlist-left">
                            <img src="./imgs/${cart[i].file_name}" alt="">
                            <div class="cartlist-detail">
                                <p style="font-size: 1.5vw;">${cart[i].m_name}</p>
                                <p style="font-size: 1.2vw;">${ numberWithCommas(cart[i].m_price * cart[i].count) } บาท</p>
                            </div>
                        </div>
                        <div class="cartlist-right">
                            <p onclick="deinitems('-', ${i})" class="btnc">-</p>
                            <p id="countitems${i}" style="margin: 0 20px;">${cart[i].count}</p>
                            <p onclick="deinitems('+', ${i})" class="btnc">+</p>
                        </div>
                    </div>`;
        }
        $("#mycart").html(html)
    }
    else {
        $("#mycart").html(`<p>ไม่มีรายการ</p>`)
    }


}



// function openCart() {
//     $('#modalCart').css('display','flex')
//     rendercart();
// }

