<?php 
  include('../bases/baseH.php');
?>

<section class="container">
  <p class="h4">Ver reporte de estado actual</p>
</section>

<section>
  <div class="card">
    <div class="card-header p-4">
      <div class="row">
        <div class="col-md-3">
          <p class="h4">Nombre de la empresa</p>
          <select class="form-select" aria-label="Default select example">
            <option selected disabled>Seleccionar empresa</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          <input type="text" class="form-control" placeholder="Nombre de la empresa">    
        </div>
        <div class="col-md-2 mt-4">
          <label for="fecha">Fecha</label>
          <input type="date" class="form-control" id="fecha">
        </div>
        <div class="col-md-2 mt-4">
          <label for="fecha2">Fecha</label>
          <input type="date" class="form-control" id="fecha2">
        </div>
        <div class="col-md-3">
          <p class="h4">Estado actual</p>
          <select class="form-select" aria-label="Default select example">
            <option selected disabled>Seleccionar estado</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          <input type="text" class="form-control" placeholder="Estado">
        </div>
        <div class="col-md-2  mt-5">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buscarSolicitud">Buscar</button>
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
                  <th>Total</th>
                  <th>Número de compra</th>
                  <th>Estado actual</th>
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
                  <td><input type="text" min="0" name="" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <p class="f-right mt-5"><input type="number" class="form-control" placeholder="Total"></p>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
  include('../bases/baseF.php');
?>