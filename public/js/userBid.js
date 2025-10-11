$('#bidHistoryModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var productId = button.data('product-id');

    var tbody = $('#bidHistoryBody');
    tbody.html('<tr><td colspan="3" class="text-center">Loading...</td></tr>');

    
    $.ajax({
        url: '/auctions/' + productId + '/history',
        method: 'GET',
        success: function(data) {
            if (data.length === 0) {
                tbody.html('<tr><td colspan="3" class="text-center">No bids yet</td></tr>');
            } else {
                var rows = '';
                data.forEach(function(bid) {
                    rows += '<tr><td>' + bid.user_id + '</td><td>' + bid.username + '</td><td>$' + parseFloat(bid.bid_amount).toFixed(2) + '</td></tr>';
                });
                tbody.html(rows);
            }
        },
        error: function() {
            tbody.html('<tr><td colspan="3" class="text-center text-danger">Failed to load bid history</td></tr>');
        }
    });
});

$('#bidNowModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var productId = button.data('product-id');
    var productName = button.data('product-name');
    var currentBid = button.data('current-bid');

    var modal = $(this);
    modal.find('#bidProductId').val(productId);
    modal.find('#bidProductName').text('Place Your Bid for ' + productName);
    modal.find('#bidAmount').attr('min', parseFloat(currentBid) + 0.01); 
});
