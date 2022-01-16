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
    console.log(id)
    let form = new FormData();
    form.append('id',id);
    let url = parent.parentElement.querySelector('form').getAttribute('action');
    console.log(url)
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
                )
                console.log(response)
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