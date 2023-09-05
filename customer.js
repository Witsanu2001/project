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
                                <p stlye="font-size: 1vw;">${ numberWithCommas(product[i].m_price) } THB</p>
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



   
var cart = [];
function addtocart() {
    var pass = true;
    $.ajax({
        method: 'post',
        url: './config/db.php',
    })
    for (let i = 0; i < cart.length; i++) {
        if( productindex == cart[i].index ) {
            console.log('found same product')
            cart[i].count++;
            pass = false;
        }
    }

    if(pass) {
        var obj = {
            index: productindex,
            id: product[productindex].id,
            m_name: product[productindex].m_name,
            m_price: product[productindex].m_price,
            file_name: product[productindex].file_name,
            count: 1
        };
        // console.log(obj)
        cart.push(obj)
    }
    console.log("cart",cart)

    Swal.fire({
        icon: 'success',
        title: 'เพิ่ม' + product[productindex].m_name + 'ไปยังตะกร้าแล้ว !'
    })
    $("#cartcount").css('display','flex').text(cart.length)
}

function openCart() {
    $('#modalCart').css('display','flex')
    rendercart();
}

function rendercart() {
    if(cart.length > 0) {
        var html = '';
        var total_price = 0;
        for (let i = 0; i < cart.length; i++) {
            total_price += cart[i].m_price*cart[i].count;
            html += `<div class="cartlist-items">
                        <div class="cartlist-left">
                            <img src="./imgs/${cart[i].file_name}" alt="">
                            <div class="cartlist-detail">
                                <p style="font-size: 1.5vw;">${cart[i].m_name}</p>
                                <p style="font-size: 1.2vw;">${numberWithCommas(cart[i].m_price * cart[i].count) } บาท</p>
                                
                            </div>
                        </div>        
                        <div class="cartlist-right">
                            <p onclick="deinitems('-', ${i})" class="btnc">-</p>
                            <p id="countitems${i}" style="margin: 0 20px;">${cart[i].count}</p>
                            <p onclick="deinitems('+', ${i})" class="btnc">+</p>
                        </div>                           
                    </div>`;
                    
                    
          
        }
        html += `<div class="cartlist-items">
                    <div class="cartlist-right"> 
                    <p style="font-size: 1.5vw;">ราคารวม ${total_price} บาท</p>
                 </div>`;
        $("#mycart").html(html)
    }
    else {
        $("#mycart").html(`<p>ไม่มีรายการ</p>`)
    }
    


}

function deinitems(action, index) {
    if(action == '-') {
        if(cart[index].count > 0) {
            cart[index].count--;
            $("#countitems"+index).text(cart[index].count)

            if(cart[index].count <= 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure to delete?',
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel'
                }).then((res) => {
                  if(res.isConfirmed) {
                     cart.splice(index, 1) 
                     console.log(cart)
                     rendercart();
                     $("#cartcount").css('display','flex').text(cart.length)
                     
                     if(cart.length <= 0) {
                        $("#cartcount").css('display','none')
                     }
                  }  
                  else {
                    cart[index].count++;
                    $("#countitems"+index).text(cart[index].count)
                  }
                })
            }
        }
    }
    else if(action == '+') {
        cart[index].count++;
        $("#countitems"+index).text(cart[index].count)
    }
}

function buynow() {
    console.log("buynow",cart)
    $.ajax({
        method: 'post',
        url: './api/buynow.php',
        data: {
            product: cart
        }, 
        success: function(response) {
            console.log(response.RespCode)
            if(response.RespCode == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'ขอบคุณ',
                    html: ` 
                    
                            <p> จำนวน : ${response.Amount.Amount}</p>
                            <p> ค่าส่ง : ${response.Amount.Shipping}</p>
                            <p> ราคารวม : ${response.Amount.Netamount}</p>
                            `
                })
                .then((res) => {
                    if(res.isConfirmed) {
                        cart = [];
                        closeModal();
                        $("#cartcount").css('display','none')
                        window.location.href = 
                        "order.php?amont="+response.Amount.Amount+
                        "&shipping="+response.Amount.Shipping+
                        "&product="+response.Amount.Product+
                        "&transid="+response.Amount.Transid+
                        "&netamount="+response.Amount.Netamount+
                        "&updated="+response.Amount.Updated_at+
                        "&userid="+response.Amount.Userid;
                        
                    }
                })
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Something is went wrong!'
                })
            }
        }, error: function(err) {
            console.log(err)
        }
    })
}