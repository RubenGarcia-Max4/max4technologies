function whatsApp(){
    var phone = "";
    var seller =  Math.floor(Math.random()*1);
    var text=encodeURIComponent('¡Quiero saber más acerca del Elevador Automático de Paneles Solares!');
     switch(seller){
       case 0: phone='524491112375'; break;
              }
    window.open('https://api.whatsapp.com/send?phone='+phone+'&text='+text);
}