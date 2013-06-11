/* Author:
Anonymus Null
*/
/* SDK Facebook*/
/*var fb = {
  config :{
  //SE INTRODUCE EL ID DE LA APLICACIÓN
    app_id : '450178278338515', 
    use_xfbml : true,
    extendPermissions : 'publish_stream' , 
    locale : 'es_ES' 
  },
  perms : [],
  hasPerm : function (perm) { for(var i=0, l=fb.perms.length; i<l; i++) { if(fb.perms[i] == perm) {return true;}} return false; },
  logged : false,
  user : false, 
  login : function (callback){
    //FUNCIÓN QUE REALIZA EL LOGIN
    FB.login(function(r) {
      if (r.session) {
        fb.logged = true;
        if(r.perms)
          fb.perms = r.perms.split(",");
        else
          fb.perms = []; 
 fb.getUser(callback);
      } else {
        fb.logged = false;
        fb.perms = [];
 callback();
      }
    },{perms:fb.config.extendPermissions});
    return false;
  },
  syncLogin : function (callback){
    if (!callback) callback = function(){};
    FB.getLoginStatus(function(r) {
      if (r.session) { 
        fb.logged = true;
        if(r.perms)
          fb.perms = r.perms.split(",");
        else
          fb.perms = []; 
 fb.getUser(callback);
        return true;
      } else {
        fb.logged = false;
        callback();
        return false;
      }
    });
  },
  logout : function(callback) {FB.logout(callback);},
  getUser : function(callback){
    //SE OBTIENEN LOS DATOS DEL USUARIO CON ESTÁ FUNCIÓN
    FB.api('/me', function(r){
      var user = r;
      user.picture = "https://graph.facebook.com/"+user.id+"/picture";
      fb.user=user; callback(user); 
    }); 

  },
  readyFuncs : [],
  ready: function(func){fb.readyFuncs.push(func)},
  launchReadyFuncs : function () {for(var i=0,l=fb.readyFuncs.length;i<l;i++){fb.readyFuncs[i]();};}
}
window.fbAsyncInit = function() { 
  if (fb.config.app_id) FB.init({appId: fb.config.app_id, status: true, cookie: true, xfbml: fb.config.use_xfbml});
  fb.syncLogin(fb.launchReadyFuncs);
};
var oldload = window.onload;
//SE CARGA EL API DE JAVASCRIPT DE FACEBOOK CONNECT
window.onload = function() {
  var d = document.createElement('div'); d.id="fb-root"; document.getElementsByTagName('body')[0].appendChild(d);
  var e = document.createElement('script'); e.async = true; e.src = document.location.protocol + '//connect.facebook.net/'+fb.config.locale+'/all.js';
  document.getElementById('fb-root').appendChild(e);
  if (typeof oldload == 'function') oldload();
};

fb.ready(function(){ 
// SE COMPRUEBA AL CARGAR LA PÁGINA SI HAY USUARIO LOGUEADO.
  if (fb.logged)
  {
    // CAMBIAMOS EL LINK DE IDENTIFICARSE POR LOS DATOS DEL USUARIO.
    html = "<p>Hola " + fb.user.name + "</p>";
    html += '<p><img src="' + fb.user.picture + '"/></p>';

    document.getElementById("conectar_facebook").innerHTML = html;

  }
});

function login() {
//FUNCIÓN QUE HACE EL LOGIN DEL FACEBOOK
  fb.login(function(){ 
    if (fb.logged) {
    // CAMBIAMOS EL LINK DE IDENTIFICARSE POR LOS DATOS DEL USUARIO.
      html = "<p>Hola " + fb.user.name + "</p>";
      html += "<p><img src='" + fb.user.picture + "'/></p>";
      document.getElementById("conectar_facebook").innerHTML = html;
   
    } else {
      alert("No se ha identificado el usuario");
    }
  })
};*/
/*fin del sdk de facebook*/

$(document).on("ready", function(){

  
$("#contenedor").load("canton.php");
     //ventana modal para mandar mensaje

  $("#evento").click(function(evento){
      //elimino el comportamiento por defecto del enlace
      evento.preventDefault();
      //Aquí pondría el código de la llamada a Ajax
      $("#contenedor").load("eventos.php");
  });   
 $("#canton").click(function(evento){
      //elimino el comportamiento por defecto del enlace
      evento.preventDefault();
      //Aquí pondría el código de la llamada a Ajax
      $("#contenedor").load("canton.php");
  });   
 $("#PrinGenerales").click(function(evento){
      //elimino el comportamiento por defecto del enlace
      evento.preventDefault();
      //Aquí pondría el código de la llamada a Ajax
  });   
 $("#CodEtica").click(function(evento){
      //elimino el comportamiento por defecto del enlace
      evento.preventDefault();
  });  
     var window = $("#window").kendoWindow({
        title: "Manda un mensaje a #yosoy132Culiacan",
        visible: false,
        actions: ["Close"],
        draggable: true,
        height: "400px",
        modal: true,
        resizable: false,
        width: "500px",
    });

   /* $("#verDatos").click(function(event){
        event.preventDefault();
                $("#datos").dialog({
                        modal: false,// para quitar el fondo negro y poder navegar con los dos
                        width: 700,
                        minWidth: 700,
                        maxWidth: 700,
                        show: "fold",
                        hide: "explode",
                        resizable: true,
                        disabled:true,//para deslizar la ventana o no
                        buttons:{
                            Cerrar: function() {
                                // Cerrar ventana de diálogo
                                $(this).dialog( "close" );
                            }
                        }
                });
    });*/



    $("#undo").css("color","black");

    $("#undo").click(function(evento){
        window.data("kendoWindow").center().open();
            $('center:last').hide();
            //mandar correo
            $("#email").submit(function(){
                    var cadena = $(this).serialize();
                    alert(cadena);
                    $.ajax({
                            async:true,
                            beforeSend: function(){
                                console.log("enviado");
                                //$("#email").hide();
                                },//Permite llamar una función antes de mandar el objeto ajax
                            type: "POST",
                            url: "/libreria/email.php",
                            data: cadena,
                            success: function(datos){
                              alert(datos);
                                    $("#email")[0].reset();
                            },
                            error: function(datos){
                                alert("fallo el envio");
                            }
                    });
              return false;
        });
    });

});//fin del ready









    
