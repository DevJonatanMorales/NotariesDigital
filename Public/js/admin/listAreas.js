const MostrarArea = () => {
  let layout = "";
  const datos = {accion: 'mostrar'};

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ServiciosModels/MostrarAreas.php",
    data: {datos},
    success: function (result) {      
      result.forEach((datos) => {
        layout += `<tr>
                    <td style="width: 500px" >
                      ${datos.nom_areas}
                    </td> 
                    <td style="width: 90px" >
                      <button type="submit" class="btn bg-success text-white" id="${datos.areas_id}">
                        <i class="fas fa-edit"></i>
                      </button>
                    <td style="width: 100px" >
                      <button type="submit" class="btn bg-danger text-white" id="${datos.areas_id}">
                        <i class="far fa-trash-alt "></i>
                      </button>
                    </td>
                  </tr>`;
      });
      $("#tbody").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    }
  });
}
/* - Comentario cuando carga - */
window.addEventListener("load", MostrarArea);
/** 
*
* Comentario: Buscar area
*
**/
let buscarArea = document.getElementById('buscar');

const form = document.getElementById('formulario');
let txtArea = document.getElementById('newArea');
let btnGuardarArea = document.getElementById('btnGuardar');

const BuscarArea = () => {
  let layout = "";
  let datos = {
    accion: 'buscar',
    query: buscarArea.value
  }

  $.ajax({
    type: 'POST',
    url: "../../../Private/Models/ServiciosModels/MostrarAreas.php",
    data: {datos},
    success: function (result) {
      result.forEach((datos) => {
        layout += `<tr>
                    <td style="width: 500px" >
                      ${datos.nom_areas}
                    </td> 
                    <td style="width: 90px" >
                      <button type="submit" class="btn bg-success text-white" id="${datos.areas_id}">
                        <i class="fas fa-edit"></i>
                      </button>
                    <td style="width: 100px" >
                      <button type="submit" class="btn bg-danger text-white" id="${datos.areas_id}">
                        <i class="far fa-trash-alt "></i>
                      </button>
                    </td>
                  </tr>`;
      });
      $("#tbody").html(layout);
    },
    error: function () {
      console.log('No se ha podido obtener la información');
    }
  });
  
}

buscarArea.addEventListener('keyup', BuscarArea);

const valCampo = () => {
  if(txtArea.value.length > 3){
    btnGuardarArea.removeAttribute("disabled");
  } else {
    btnGuardarArea.setAttribute("disabled", "");
  }
}

txtArea.addEventListener('keyup', valCampo);

const GuardarArea = () => {
  let datos = {
    accion: 'guardar',
    area: txtArea.value
  };

  $.ajax({
    type: "POST",
    url: '../../../Private/Models/AdminModels/nuevaArea.php',
    data: {datos},
    success: function (data) {
      MostrarArea()
      if (data == 1) {
        console.log(data);
        $("#myModal .close").click()
      } else {

      }
    },
    error: function () {
      console.log('No se ha podido obtener la información');
    }
  });
  
}

const LimpiarCampos = () => {
  txtArea.value = '';
}

form.addEventListener('submit', e => {
  e.preventDefault();
  if (txtArea.value.length > 3) {
    GuardarArea();
    form.reset();
    LimpiarCampos();
  } else {
    console.log('error');
  }
});
/*
$(function() {
 $(document).on('click', 'button[type="button"]', function(event) {//al hacer click en el boton
    var id = this.id;//obtengo el valor del id, el id tiene q tener el nombre del archivo
    //console.log("Se presionó el Boton con ID: "+ id)//mostrar el ID de botton
    $('.modal-content').load("Views/Content/admin/"+id+".php",function(){//llamo al archivo q tiene el contenido
        $('#myModal').modal({show:true});//cargo la ventana modal
    });
  });
});*/