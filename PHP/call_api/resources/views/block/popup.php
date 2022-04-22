<style>
    .nav-link{
        cursor: pointer;
    }
    .popup-notification {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }

    .popup-notification.hidden {
        display: none;
    }

    .popup-notification-body {
        min-width: 400px;
        background-color: #fff;
        display: inline-block;
        padding: 10px;
        border-radius: 4px;
        cursor: pointer;
        position: relative;
    }

    .popup-notification-body .alert {
        margin: 0;
    }

    .popup-notification-body .title {
        position: absolute;
        background-color: rgba(0, 0, 0, 0.4);
        color: #fff;
        min-width: 55%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 2px 5px;
        pointer-events: none;
    }

    .popup-notification-body .title.hidden{
        display: none;
    }
</style>

<script>
    setTimeout(function() {
        $('.popup-notification').addClass('hidden')
    }, 5000)

    $('.popup-notification-body').on('click', function() {
        $('.popup-notification').addClass('hidden')
    })

    $('.popup-notification-body').on('mousemove', function(e) {
        let top = $(this)[0].getBoundingClientRect().top;
        let height = $(this)[0].getBoundingClientRect().height;
        let left = $(this)[0].getBoundingClientRect().left;
        let width = $(this)[0].getBoundingClientRect().width;
        $(this).children('.title')
            .css('top', (((e.clientY - top) / height) * 100) + 10 + '%')
            .css('left', (((e.clientX - left) / width) * 100) + 5 + '%')
    })

    $('.popup-notification-body').hover(function () {
        $(this).children('.title').removeClass('hidden')
    }, function () {
        $(this).children('.title').addClass('hidden')
    })
</script>