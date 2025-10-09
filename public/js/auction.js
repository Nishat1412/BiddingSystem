$(document).ready(function () {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $('#productModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const modal = $(this);
        const scrollY = window.scrollY;

        document.body.style.position = 'fixed';
        document.body.style.top = `-${scrollY}px`;
        document.body.style.width = '100%';

        modal.find('.modal-title').text(button.data('name'));
        modal.find('.modal-price').text(button.data('price'));
        modal.find('.modal-description').text(button.data('description'));
        modal.find('.modal-rating').text(button.data('rating'));
        modal.find('.modal-img').attr('src', button.data('image'));
    });

    $('.startAuctionForm').on('submit', function (e) {
        e.preventDefault();
        const form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function (res) {
                if (res.success) {
                    alert('Auction started successfully!');
                    form.closest('.modal').modal('hide');
                    location.reload();
                } else {
                    alert(res.message || 'Failed to start auction.');
                }
            },
            error: function (xhr) {
                alert(xhr.responseJSON?.message || 'Error starting auction.');
            }
        });
    });

    function startProductCountdowns() {
        const timers = document.querySelectorAll('.countdown-timer');

        timers.forEach(timer => {
            const start = new Date(timer.dataset.start).getTime();
            const end = new Date(timer.dataset.end).getTime();
            const timeLeftEl = timer.querySelector('.time-left');

            const interval = setInterval(() => {
                const now = new Date().getTime();

                if (now < start) {
                    timeLeftEl.textContent = formatTime(start - now);
                    timer.querySelector('.countdown-label').textContent = "Starts in:";
                } else if (now >= start && now < end) {
                    timeLeftEl.textContent = formatTime(end - now);
                    timer.querySelector('.countdown-label').textContent = "Ends in:";
                } else {
                    timeLeftEl.textContent = "Finished";
                    clearInterval(interval);
                }
            }, 1000);
        });
    }

    function formatTime(ms) {
        let days = Math.floor(ms / (1000 * 60 * 60 * 24));
        let hours = Math.floor((ms % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((ms % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((ms % (1000 * 60)) / 1000);
        return `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }

    startProductCountdowns();
});

