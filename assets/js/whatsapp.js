function whatsApp(){
    var phone = "";
    var seller =  Math.floor(Math.random()*1);
    var text=encodeURIComponent('¡Quiero más información de Más Mensajes!');
     switch(seller){
       case 0: phone='5214491112375'; break;
              }
    window.open('https://api.whatsapp.com/send?phone='+phone+'&text='+text);
}