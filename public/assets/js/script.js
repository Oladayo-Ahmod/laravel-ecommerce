// ajax set up
$.ajaxSetup({
    headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

// add to cart functionality
add_to_cart = (element)=>{
    let parent = element.parentElement;
    let id = parent.querySelector('.product_id').value;
    let cart = $('.total_items').html();
    let form = new FormData();
    form.append('id',id);
    let url = parent.parentElement.querySelector('form').getAttribute('action');
    let type = parent.parentElement.querySelector('form').getAttribute('method');
    $.ajax({
        url :url,
        method : type,
        data : form,
        processData : false,
        dataType : 'json',
        contentType : false,
        success : function(response){
            if (response.msg = 'success') {
                Swal.fire(
                    'Added',
                    'Product added to cart.',
                    'success'
                ).then(function(){
                    $('.checkout-btn').removeClass('d-none')
                    $('#product-image').css('height','390px')
                })
                $('.total_items').html(Number(cart) + 1);
            }
            else{
                Swal.fire(
                    'Error',
                    'Error adding product to cart.',
                    'danger'
                )
            }
        }
    
    })
}

// remove from cart functionality
remove_cart = (element)=>{
    let parent = element.parentElement;
    let id = parent.querySelector('.product_id').value;
    let cart = $('.total_items').html();
    let form = new FormData();
    form.append('id',id);
    let url = parent.parentElement.querySelector('form').getAttribute('action');
    let type = parent.parentElement.querySelector('form').getAttribute('method');
    $.ajax({
        url :url,
        method : type,
        data : form,
        processData : false,
        dataType : 'json',
        contentType : false,
        success : function(response){
            if (response.msg = 'success') {
                Swal.fire(
                    'Removed',
                    'Product removed from cart.',
                    'warning'
                ).then(function(){
                   
                    $('.total_items').html(Number(cart) - 1);
                })
                // console.log(response)
                parent.parentElement.parentElement.style.display = 'none'
            }
            else{
                Swal.fire(
                    'Error',
                    'Error removing product from cart.',
                    'danger'
                )
            }
        }
    
    })
}

