$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Quick view modal 
    $('#productModal').on('show.bs.modal', function(event){
        const button = $(event.relatedTarget);
        const modal = $(this);
        modal.find('.modal-title').text(button.data('name'));
        modal.find('.modal-price').text(button.data('price'));
        modal.find('.modal-description').text(button.data('description'));
        modal.find('.modal-rating').text(button.data('rating'));
        modal.find('.modal-img').attr('src', button.data('image'));
    });
    

    $('#startAuctionForm').on('submit', function(e){
        e.preventDefault();

        const form = $(this);
        const start = new Date(form.find('[name="start_time"]').val());
        const end   = new Date(form.find('[name="end_time"]').val());

        $('#auction-start').text(start.toISOString());
        $('#auction-end').text(end.toISOString());
        $('#auction-info').show();

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(res){
                if(res.success){
                    alert('Auction started for all products!');
                    $('#startAuctionModal').modal('hide');
                    location.reload();
                } else {
                    alert(res.message || 'Failed to start auction.');
                }
            },
            error: function(xhr){
                let msg = xhr.responseJSON?.message || 'Error starting auction';
                alert(msg);
            }
        });
    });


    function startCountdown(){
        let startElem = document.getElementById("auction-start");
        let endElem   = document.getElementById("auction-end");
        let countdownElem = document.getElementById("auction-countdown");

        if (startElem && endElem && startElem.textContent.trim() !== "" && endElem.textContent.trim() !== "") {
            let startTime = new Date(startElem.textContent).getTime();
            let endTime   = new Date(endElem.textContent).getTime();

            let timer = setInterval(function () {
                let now = new Date().getTime();

                if (now < startTime) {
                    let distance = startTime - now;
                    countdownElem.innerHTML = "Auction starts in: " + formatTime(distance);
                } else if (now >= startTime && now < endTime) {
                    let distance = endTime - now;
                    countdownElem.innerHTML = "Auction ends in: " + formatTime(distance);
                } else {
                    countdownElem.innerHTML = "Auction finished";
                    clearInterval(timer);
                }
            }, 1000);
        }
    }

    function formatTime(ms) {
        let days = Math.floor(ms / (1000 * 60 * 60 * 24));
        let hours = Math.floor((ms % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((ms % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((ms % (1000 * 60)) / 1000);
        return `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }

    startCountdown();

});
