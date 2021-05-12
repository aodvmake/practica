<?php 
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
          <select class="form-select" aria-label="Default select example">
            <option selected disabled>Seleccionar empresa</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          <input type="text" class="form-control" placeholder="Nombre de la empresa">    
        </div>
        <div class="col-md-8">
          <button class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#buscarSolicitud">Buscar</button>
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
                    <select class="form-select" aria-label="Default select example">
                      <option selected disabled>Seleccionar pieza</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Pieza">  
                  </td>
                  <td><input type="number" min="0" name="" class="form-control"></td>
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
                    <td><button class="btn btn-primary">Seleccionar</button></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="" class="form-control"></td>
                    <td><input type="number" min="0" name="" class="form-control"></td>
                    <td><input type="number" min="0" name="" class="form-control"></td>
                    <td><input type="text" name="" class="form-control"></td>
                    <td><input type="number" min="0" name="" class="form-control"></td>
                    <td><input type="number" min="0" name="" class="form-control"></td>
                    <td><button class="btn btn-primary">Seleccionar</button></td>
                  </tr>
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