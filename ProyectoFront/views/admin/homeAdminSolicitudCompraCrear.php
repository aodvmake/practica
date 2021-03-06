<?php 
  include('../../controllers/sesionadm.php');
  include('../bases/baseH.php');
?>

<section class="container">
  <br>

  <p class="h4">Crea solicitud de compra</p>
</section>
<input type="hidden" name="id_solicitud" id="id_solicitud">
<input type="hidden" name="id_pieza" id="id_pieza">
<section>
  <div class="card">
    <div class="card-header p-4">
      <div class="row">
        <div class="col-md-4">
          <p class="h4">Nombre de la empresa</p>
          <div class="input-group mb-3">
            <select class="form-select mt-2" aria-label="Default select example" id="resultadoempresa"></select>
            <div class="input-group-append">
              <button class="btn btn-primary f-right mt-2" id="btnfinalizar">Finalizar</button>
            </div>
          </div>
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
      <br>
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
              <tbody id="tabla_detalles">
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php 
  include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/solicitud.js"></script>