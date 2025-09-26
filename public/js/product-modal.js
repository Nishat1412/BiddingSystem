
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

    scrollY = window.scrollY;
    document.body.style.position = 'fixed';
    document.body.style.top = `-${scrollY}px`;
    document.body.style.left = '0';
    document.body.style.right = '0';
    document.body.style.width = '100%';
    document.body.style.overflow = 'hidden';
    
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