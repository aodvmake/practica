<?php 
  include('../../controllers/sesionadm.php');
  include('../bases/baseH.php');
?>
<br>
<section class="container">
  <p class="h3">Ver reporte de estado actual</p>
</section>
<br>
<section class="container">
  <p class="h4">Piezas Terminadas</p>
</section>

<section>
  <div class="card">
    <div class="card-header p-4">
      <div class="row">
    </div>    
   <hr>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>Empresa</th>
                  <th>Pieza</th>
                  <th>No Compra</th>
                  <th>Código</th>
                  <th>Cantidad</th>
                  <th>Progreso</th>
                  <th></th>
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
</section>
<br><br>
                    <button type="button" class="btn btn-primary "><i class="fas fa-check-circle"></i></button>
                    <i class="fas fa-check-circle"></i>
<section class="container">
  <p class="h4">Estado actual</p>
</section>

<section>
  <div class="card">
    <div class="card-header p-4">
      <div class="row">
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
                  <th>Total</th>
                  <th>Número de compra</th>
                  <th>Estado actual</th>
                </tr>
              </thead>
              <tbody id="resultado">
                <tr>
                  <td><input type="text" name="" class="form-control"></td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><input type="text" name="" class="form-control"></td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
                  <td><input type="text" min="0" name="" class="form-control"></td>
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
<script type="text/javascript" src="../../js/estadoactual.js"></script>