console.log("Archivo conectado");
/** 
*
* Comentario: Vista previa de la foto
*
**/
$(document).ready(function(){

    //--------------------- SELECCIONAR FOTO ---------------------
    $("#foto").on("change",function(){
    	var uploadFoto = document.getElementById("foto").value;
        var foto       = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
        
            if(uploadFoto !='')
            {
                var type = foto[0].type;
                var name = foto[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';                        
                    $("#img").remove();
                    $(".delPhoto").addClass('notBlock');
                    $('#foto').val('');
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".prevPhoto").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    }
              }             
    });

    $('.delPhoto').click(function(){
    	$('#foto').val('');
    	$(".delPhoto").addClass('notBlock');
    	$("#img").remove();

    });

});

const txtFoto = document.getElementById('foto');
const btnFoto = document.getElementById('btnFoto');

txtFoto.addEventListener("change", () => {
  if (txtFoto.value.length > 0) {
    btnFoto.removeAttribute("disabled");
  } else {
    btnFoto.setAttribute("disabled", "");
  }
});

const getParameterByName = (name) => {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  let regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
  results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
