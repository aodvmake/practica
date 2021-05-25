<?php 
  include('../../controllers/sesionadm.php');
  include('../bases/baseH.php');
?>

<section class="container">
  <br>
  <p class="h4">Crea solicitud de compra</p>
</section>

<section>
  <div class="card">
    <div class="card-header p-4">
      <div class="row">
        <div class="col-md-4">
          <p class="h4">Nombre de la empresa</p>
          <select class="form-select" aria-label="Default select example" id="resultadoempresa">
          </select>
        </div>
        <div class="col-md-8">
          <button class="btn btn-primary f-right mt-2">Finalizar</button>
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
                  <th>Numero de la empresa</th>
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
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><input type="text" name="" class="form-control"></td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><input type="date" name="" class="form-control"></td>
                  <td><input type="date" name="" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </div>
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
              <tbody>
                <tr>
                  <td><input type="text" name="" class="form-control"></td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><input type="text" name="" class="form-control"></td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><button class="btn btn-danger">Quitar</button></td>
                </tr>
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