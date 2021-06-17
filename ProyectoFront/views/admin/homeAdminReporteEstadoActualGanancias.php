<?php 
  include('../../controllers/sesionadm.php');
  include('../bases/baseH.php');
?>
<br>
<section class="container">
  <p class="h4">Ver reporte de estado actual</p>
</section>

<section>
  <div class="card">
    <div class="card-header p-4">
      <div class="row">
        <div class="col-md-3">
          <p class="h4">Nombre de la empresa</p>
          <select class="form-select selectp" aria-label="Default select example" id="consultarempresa">
          </select>
          <input type="hidden" name="id_empresa" id="id_empresa">    
        </div>
        <div class="col-md-2 mt-4">
          <label for="fecha">Fecha</label>
          <input type="date" class="form-control" id="fecha_p">
        </div>
        <div class="col-md-2 mt-4">
          <label for="fecha2">Fecha</label>
          <input type="date" class="form-control" id="fecha_f">
        </div>
        <div class="col-md-2  mt-5">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buscarSolicitud" id="btnconsultar">Buscar</button>
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
                  <th>Cantidad</th>
                  <th>Número de compra</th>
                  <th>Código</th>
                  <th>Total</th>

                </tr>
              </thead>
              <tbody id="reporteEstado">

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
<script type="text/javascript" src="../../js/ganancia.js"></script>