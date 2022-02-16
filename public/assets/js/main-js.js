// var cData = JSON.parse(`<?php echo $chart_data; ?>`);

jQuery(document).ready(function($) {
    'use strict';
    // =============================================================
    
    // ============================================================== 
    // Notification list
    // ============================================================== 
    if ($(".notification-list").length) {

        $('.notification-list').slimScroll({
            height: '250px'
        });

    }

    // ============================================================== 
    // Menu Slim Scroll List
    // ============================================================== 


    if ($(".menu-list").length) {
        $('.menu-list').slimScroll({

        });
    }

    // ============================================================== 
    // Sidebar scrollnavigation 
    // ============================================================== 

    if ($(".sidebar-nav-fixed a").length) {
        $('.sidebar-nav-fixed a')
            // Remove links that don't actually link to anything

            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top - 90
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                };
                $('.sidebar-nav-fixed a').each(function() {
                    $(this).removeClass('active');
                })
                $(this).addClass('active');
            });

    }

    // ============================================================== 
    // tooltip
    // ============================================================== 
    if ($('[data-toggle="tooltip"]').length) {
            
            $('[data-toggle="tooltip"]').tooltip()

        }

     // ============================================================== 
    // popover
    // ============================================================== 
       if ($('[data-toggle="popover"]').length) {
            $('[data-toggle="popover"]').popover()

    }
     // ============================================================== 
    // Chat List Slim Scroll
    // ============================================================== 
        

        if ($('.chat-list').length) {
            $('.chat-list').slimScroll({
            color: 'false',
            width: '100%'


        });
    }
    // ============================================================== 
    // dropzone script
    // ============================================================== 

 //     if ($('.dz-clickable').length) {
 //            $(".dz-clickable").dropzone({ url: "/file/post" });
 // }

}); // AND OF JQUERY

// ajax set up
$.ajaxSetup({
    headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

// delete category functionality ajax
delete_cat = (element)=>{
    let parent = element.parentElement;
    console.log( )
    let form = new FormData();
    let url = parent.parentElement.querySelector('form').getAttribute('action');
    let type = parent.parentElement.querySelector('form').getAttribute('method');
    let id = parent.querySelector('.cat_id').value
    form.append('cat_id',id);
    Swal.fire({
        title: 'Are you sure',
        text: "you want to DELETE this category?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url :url,
                method : type,
                data : form,
                processData : false,
                dataType : 'json',
                contentType : false,
                success : function(response){
                    if (response.msg = 'deleted') {
                        Swal.fire(
                            'Deleted!',
                            'Category deleted successfully.',
                            'success'
                        )
                        parent.parentElement.parentElement.parentElement.querySelector('.delete_row').style.display = 'none'; // remove the row after deleting
                    }
                    else{
                        Swal.fire(
                            'Error!',
                            'Error deleting category.',
                            'danger'
                        )
                    }
                }
            
            })
    
        }
    })
    
}

// delete product functionality ajax
delete_product = (element)=>{
    let parent = element.parentElement;
    let form = new FormData();
    let url = parent.parentElement.querySelector('form').getAttribute('action');
    let type = parent.parentElement.querySelector('form').getAttribute('method');
    let id = parent.querySelector('.prd_id').value
    form.append('prd_id',id);
    Swal.fire({
        title: 'Are you sure',
        text: "you want to DELETE this product?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url :url,
                method : type,
                data : form,
                processData : false,
                dataType : 'json',
                contentType : false,
                success : function(response){
                    if (response.msg = 'deleted') {
                        Swal.fire(
                            'Deleted!',
                            'Product deleted successfully.',
                            'success'
                        )
                        parent.parentElement.parentElement.parentElement.querySelector('.delete_row').style.display = 'none'; // remove the row after deleting
                    }
                    else{
                        Swal.fire(
                            'Error!',
                            'Error deleting product.',
                            'danger'
                        )
                    }
                }
            
            })
        }
    })      
}

// add categor)y functionality
add_category = (element)=>{
    let parent = element.parentElement;
    let name = parent.querySelector('.cat_name').value;
    let form = new FormData();
    form.append('name',name);
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
            $('#add-category').modal('hide')
            if (response.msg = 'success') {
                $('.cat_name').val('');
                Swal.fire({
                    showConfirmButton: false,
                    timer: 1500,
                    title :'Added',
                    text : 'Category added successfully.',
                    icon :'success'
                })
                console.log(response)
            }
            else{
                Swal.fire(
                    'Error',
                    'Error adding category.',
                    'danger'
                )
            }
        }
    
    })
}

// update orders functionalities
update_orders=(el)=>{
    let parent = el.parentElement
    let url = parent.parentElement.querySelector('form').getAttribute('action');
    let type = parent.parentElement.querySelector('form').getAttribute('method');
    let user_id = parent.querySelector('.user_id').value
    let order_id = parent.querySelector('.order_id').value
    let form = new FormData();
    form.append('status',el.value)
    form.append('user_id',user_id)
    form.append('order_id',order_id)
    Swal.fire({
        title: 'Are you sure',
        text: `You want to update this order to  ${el.value}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url :url,
                method : type,
                data : form,
                processData : false,
                dataType : 'json',
                contentType : false,
                success : function(response){
                    console.log(response)
                    if (response.msg = 'updated') {
                        Swal.fire(
                            'Updated!',
                            'Order updated successfully.',
                            'success'
                        )
                        parent.parentElement.parentElement.querySelector('.update_delivery').innerHTML = el.value; // remove the row after deleting
                    }
                   
                    else{
                        Swal.fire(
                            'Error!',
                            'Error updating order.',
                            'danger'
                        )
                    }
                }
            
            })
    
        }
    })
}