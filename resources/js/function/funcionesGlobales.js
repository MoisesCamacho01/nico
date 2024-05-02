
function ruta(ruta){
    let seguridad = "http://";
    let nameproyect="bustrab2";
    let url = location.host;
    let dominio = seguridad+url+'/'+nameproyect+'/';

    return dominio+ruta;
}