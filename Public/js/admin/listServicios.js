const Mostrar = () => {
  let layout = "";
  const datos = {accion: 'mostrar'};
  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/AdminModels/nuevoServicio.php',
    data: {datos},
    success: function (result) {
      result.forEach((datos) => {
        layout += `<tr>
                    <td style="width: 500px" >
                      ${datos.nom_servicio}
                    </td>                    
                    <td style="width: 370px" >
                      ${datos.nom_areas}
                    </td> 
                    <td style="width: 95px" >
                      <button type="submit" class="btn bg-success text-white" id="1">
                        <i class="fas fa-edit"></i>
                      </button>
                    <td style="width: 95px" >
                      <button type="submit" class="btn bg-danger text-white" id="1">
                        <i class="far fa-trash-alt "></i>
                      </button>
                    </td>
                  </tr>`;
      });
      $("#tbody").html(layout);
    },
    error: function () {
      console.log('no se pudo obtener la informacion');
    }
  })
}

window.addEventListener('load', Mostrar);