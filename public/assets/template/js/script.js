$(document).ready(function(){
    setTimeout(function (){
        heightHeader()
    }, 100);
    $(window).resize(function(){
        heightHeader();
    });

    if(window.location.pathname === '/'){
        let get_params = window.location.search.substring(1),
            params_list = [],
            new_params_list = [],
            params = new FormData();
        if(get_params.indexOf('&') !== -1){
            params_list = get_params.split('&');
            for(let i = 0; i < params_list.length; i++){
                let item_list = params_list[i].split('=');
                new_params_list[item_list[0]] = item_list[1];
            }
        } else {
            params_list = get_params.split('=');
            new_params_list[params_list[0]] = params_list[1];
        }

        params.append('action', 'trackerSource');
        params.append('utm_source', new_params_list['utm_source']);

        $.ajax({
            url: 'https://test-fin.s-sobakoy-na-more.ru/ajax',
            type: 'POST',
            data: params,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false
        }).done(function (a) {
            // alert(a.text);
        });

    }

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

    $('body').on('click', '.btn-delete-offer', function () {
        let btn    = $(this),
            params = new FormData(),
            id_offer   = btn.attr('data-id_offer');

        params.append('action', 'deleteOffer');
        params.append('id_offer', id_offer);
        btn.addClass('disabled');
        $.ajax({
            url: 'https://test-fin.s-sobakoy-na-more.ru/ajax',
            type: 'POST',
            data: params,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false
        }).done(function (a) {
            if (a.status == 'success') {
                btn.fadeOut('slow', function() {
                    btn.closest('tr').remove();
                });
            } else {
                alert(a.text);
            }
            btn.removeClass('disabled');
        });

    });
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
$(window).on('load', function() {
    $('body').addClass('body_visible');
});
function heightHeader() {
    let headerHeight = $('.header').outerHeight(true);
    $('.wrapper__page').css('padding-top', headerHeight);
}