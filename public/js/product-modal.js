
    document.addEventListener("DOMContentLoaded", function () {
        const deleteForms = document.querySelectorAll(".delete-form");

        deleteForms.forEach(function (form) {
            form.addEventListener("submit", function (e) {
                e.preventDefault(); // Stop form submission
                if (confirm("Are you sure you want to delete this product?")) {
                    form.submit(); // Submit form if user confirms
                }
            });
        });
    });

$('#productModal').on('show.bs.modal', function (e) {
   var button = $(e.relatedTarget);
   var productId = button.data('id');
   $(this).find('.request-auction').attr('data-id', productId);
});

$('.request-auction').on('click', function(e){
    e.preventDefault();
    var pid = $(this).data('id');
    $.ajax({
        url: '/products/' + pid + '/request-auction',
        method: 'POST',
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: function(){
            alert('Request sent to admin.');
            $('#productModal').modal('hide');
        }
    });
});


$('#productModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var modal = $(this);
    var scrollY;

    var scrollY = -parseInt(document.body.style.top || '0');
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.left = '';
    document.body.style.right = '';
    document.body.style.width = '';
    document.body.style.overflow = 'hidden';
    window.scrollTo(0, scrollY); 

    modal.find('.modal-title').text(button.data('name'));
    modal.find('.modal-price').text(button.data('price'));
    modal.find('.modal-description').text(button.data('description'));
    modal.find('.modal-rating').text(button.data('rating'));
    modal.find('.modal-img').attr('src', button.data('image'));
   
    var productId = button.data('id');
    modal.find('.request-auction').attr('data-id', productId);
    
    var currentUserId = $('meta[name="user-id"]').attr('content');
    var ownerId = button.data('owner-id'); 
    var auctionButton = modal.find('.request-auction');

    if (currentUserId && currentUserId == ownerId) {
        auctionButton.show(); 
    } else {
        auctionButton.hide(); 
    }
});