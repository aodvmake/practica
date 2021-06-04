<?php 
  include('../../controllers/sesionadm.php');
  include('../bases/baseH.php');
?>

<section class="container">
  <p class="h4">Editar solicitud de compra</p>
</section>

<section>
  <div class="card">
    <div class="card-header p-4">
      <div class="row">
        <div class="col-md-4">
          <p class="h4">Nombre de la empresa</p>
          <input type="text" class="form-control" placeholder="Nombre de la empresa" id="nombre_em">    
        </div>
        <input type="hidden" name="solicitud" id="solicitud">
        <input type="hidden" name="id_em" id="id_em">
        <input type="hidden" name="id_pieza" id="id_pieza">
        <div class="col-md-8">
          <button class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#buscarSolicitud" id="btnbuscar">Buscar Solicitud</button>
        </div>
      </div>
      
      <hr>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>Nombre de la pieza</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Código</th>
                  <th>Numero de compra</th>
                  <th>Fecha compromiso</th>
                  <th>Avisar antes de</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select class="form-select selectprecio" aria-label="Default select example" id="consultarpieza">
                    </select> 
                  </td>
                  <td><input type="number" min="0" name="" id="precio" class="form-control" readonly></td>
                  <td><input type="number" min="0" name="cantidad" id="cantidad" class="form-control"></td>
                  <td><input type="text" name="" id="codigo" class="form-control"></td>
                  <td><input type="text" id="ncompra" name="" class="form-control"></td>
                  <td><input type="date" name="" id="fecha_c"class="form-control"></td>
                  <td><input type="date" name="" id="fecha_a" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <button class="btn btn-primary float-right" id="guardar">Agregar</button>
        </div>
      </div>

      Detalles
      <hr>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>Nombre de la pieza</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Código</th>
                  <th>Total</th>
                  <th>Número de compra</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="datos">
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="modal fade" id="buscarSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccionar solicitud a editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-stripped">
                <thead>
                  <tr>
                    <th>Nombre de la empresa</th>
                    <th>Fecha de creación de la solicitud</th>
                  </tr>
                </thead>
                <tbody id="resultado">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/editarsolicitud.js"></script>
