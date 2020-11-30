/** 
*
* Comentario: Vista previa de la foto
*
**/
$(document).ready(function() {

    //--------------------- SELECCIONAR FOTO ---------------------
    $("#foto").on("change", function() {
      var uploadFoto = document.getElementById("foto").value;
      var foto = document.getElementById("foto").files;
      var nav = window.URL || window.webkitURL;
      var contactAlert = document.getElementById('form_alert');
        
        if(uploadFoto != '')
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

/** 
*
* Comentario: Cambiar foto
*
**/
let formulario = document.getElementById('formulario');

formulario.addEventListener("submit", (e) => {
  e.preventDefault();

  let formData = new FormData();
  let fileFoto = $('#foto')[0].files[0];

  formData.append('file',fileFoto);

  $.ajax({
    url: "../../../Private/Models/ClienteModels/cambiarFoto.php",
    type: "post",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
    
      if (response == 1) {
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Foto actualizada con exito.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        }).then((result) => {
          if (result.value) {
            location.reload();
          }    
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al actualizar la foto.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });        
      }
    },
    error: function () {
      console.log('No se ha podido obtener la informacion.');
    }
  });

  formulario.reset();
  $('#foto').val('');
  $(".delPhoto").addClass('notBlock');
  $("#img").remove();
});