function alerta_system(){
    let msm = $('.msm').length
    if(msm>0){
        $('.notificaciones').removeAttr('style');
        $('.notificaciones').css({
            'display':'block'
        });
    }else{
        $('.notificaciones').removeAttr('style');
    }
}

function message_systema(tipo, titulo, mensaje){
    $.getJSON( "conFig/msm/msm_system.json", function(dato) {
        
        let estilo = dato[tipo];
        let template = '';
        let title = '';
        let body = '';
        template = '';
        
        $.each(estilo, function (row, raw) { 
            let array = raw['title'];
            array.forEach(row =>{
                title+=''+row+'';
            });
            let array2= raw['body'];
            array2.forEach(row =>{
                body+=''+row+'';
            })
        });
        template+=`
            <div class="msm">
                <div class="title_msm" style="`+title+`">`+titulo+`</div>
                <div class="body_msm" style="`+body+`">
                    <article>
                        `+mensaje+`
                    </article>
                </div>
            </div>
        `
        $(".msm_contenido").append(template);
        alerta_system();
    });
}

// NOTIFICACION TOAST
function msm_toast(contador){
    setTimeout(() => {
        $(".notification_tast[tagname="+contador+"]").show().css({
            "right":"-400px",
        })
        setTimeout(() => {
            $(".notification_tast[tagname="+contador+"]").attr('alt','0')
            $(".notification_tast[tagname="+contador+"]").remove();
        }, 800);
        let opr = $(".notification_tast:last").attr('tagname')
        let altura=1
        let distancia_actual=0
        let altura_final=0
        for (let i = 1; i <= opr; i++) {
            if(parseInt($(".notification_tast[tagname="+i+"]").attr('alt'))>0){
                distancia_actual = parseInt($(".notification_tast[tagname="+i+"]").attr('alt'))
                altura=$(".notification_tast[tagname="+i+"]").height()
                altura_final= distancia_actual- altura - 20
                if(altura_final<0){
                    altura_final=altura_final*(-1)
                }
                $(".notification_tast[tagname="+i+"]").css({
                    "top":altura_final,
                })
                $(".notification_tast[tagname="+i+"]").attr('alt',altura_final)
            }
        }
        
    }, 4500);
}

function notification_toast(tipo, titulo, msm){
    $.getJSON( "conFig/msm/msm_toast.json", function(dato) {
        let array = dato[tipo];
        let css = "";
        let template = "";
        array.forEach(row =>{
            css+=''+row+'';
        });
        let id = $(".notification_tast").length
        let contador = id+1
        let top=0
        let altura=0
        
        if(contador === 1){
            top = contador+19
        }else{
            altura = $(".notification_tast:last").height()
            top = (contador*20)+(altura*id)
            contador= parseInt($(".notification_tast:last").attr('tagname'))+1
        }
        template+=`
            <section class="notification_tast" tagname="`+contador+`" alt="`+top+`" style="top:`+top+`px">
                <div class="contendido_toast">
                    <div class="img_toast" style="`+css+`">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="toast_body">
                        <div class="title_toast">
                            <p>`+titulo+`</p>
                        </div>
                        <div class="msm_toast">
                            <p>`+msm+`</p>
                        </div>
                    </div>
                </div>
            </section>
        `
        $("body").append(template);

        $(".notification_tast").show().css({
            "right":"20px",
        })
        
        msm_toast(contador)
        
    })
}
