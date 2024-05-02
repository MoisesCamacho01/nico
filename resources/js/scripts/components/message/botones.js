$(document).ready(function () {
    $('.msm_alert').click(function (e) { 
        e.preventDefault();
        $('.notificaciones').css({
            "width":"55vh",
            "height":"100vh",
            "top":"0",
            "right":"0",
            "background-image": "linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%)"
        });
        $('.msm_title').css({
            "justify-content":"flex-start",
            "padding-left":"10px",
            "background-color": "#494949"
        })
        $('.msm_contenido').css({
            "display":"block"
        })
        $('.msm_footer').css({
            "display":"block"
        });
    });
    $('#close_n').click(function (e) { 
        e.preventDefault();
        alerta_system();
        $('.msm_title').removeAttr('style');
        $('.msm_contenido').removeAttr('style');
        $('.msm_footer').removeAttr('style');
    });
});