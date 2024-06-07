$(window).on('load', function() {
    $('body').addClass('body_visible');
});
$(document).ready(function(){
    setTimeout(function (){
        heightHeader()
    }, 100);
    $(window).resize(function(){
        heightHeader();
    });



    $('body').on('click', '.btn-test', function () {
        let btn = $(this),
            info = btn.attr('data-info');

        let params = new FormData();
        params.append('action', 'test');
        params.append('info', info);

        btn.addClass('disabled').html('Выполняю...');
        $.ajax({
            url: './core/elements/snippets/ajax.php',
            type: 'POST',
            data: params,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
        }).done(function (a) {
            if(a.status === 'success'){
                btn.removeClass('disabled').html('Выпонить');
                btn.closest('body').find('h1').text(a.info_text);
            } else {
                alert(a.text);
            }
        });
        return false;
    });

    if($('body').find('.timer').length > 0){
        let duration = 600 * 1000, // Длительность таймера в милисекундах (10 минут)
            duration_now = 0,
            time_now_sec = new Date().getTime(),
            date_end = time_now_sec + duration,
            time_save = parseInt(window.localStorage.getItem('timerEnd'));

        if(time_save && !isNaN(time_save)){
            if(time_save > time_now_sec){
                duration_now = time_save - time_now_sec;
            } else {
                window.localStorage.setItem('timerEnd', date_end);
            }
        } else {
            window.localStorage.setItem('timerEnd', date_end);
        }

        let minutes = Math.floor((duration_now === 0 ? duration : duration_now) / 60000),
            seconds = Math.floor(((duration_now === 0 ? duration : duration_now) % 60000) / 1000);
        $('.timer').text((minutes < 10 ? "0" + minutes : minutes ) + ':' + (seconds < 10 ? "0" + seconds : seconds));
        setTimer(duration, duration_now);
    }

    function setTimer(duration, duration_now) {
        let time_end = duration_now === 0 ? duration : duration_now;
        let timer = setInterval(function () {
            time_end -= 1000;

            if(time_end > 0) {
                let minutes = Math.floor(time_end / 60000),
                    seconds = Math.floor((time_end % 60000) / 1000);

                $('.timer').text((minutes < 10 ? "0" + minutes : minutes) + ':' + (seconds < 10 ? "0" + seconds : seconds));
            } else {
                clearInterval(timer);
                let time_now_sec = new Date().getTime();
                localStorage.setItem('timerEnd', time_now_sec + duration); // Сброс конечного времени
                setTimer(duration, 0); // Перезапуск таймера
            }
        }, 1000);
    };
});
function heightHeader() {
    let headerHeight = $('.header').outerHeight(true);
    $('.wrapper__page').css('padding-top', headerHeight);
}