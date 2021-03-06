<?php 
  include('../../controllers/sesionadm.php');
  include('../bases/baseH.php');
?>

<section class="container pt-5 pb-5">
	<div class="row">
		<div class="col-lg-3">
			<input type="search" name="" placeholder="Buscar pieza" class="form-control">
		</div>
		<div class="col-lg-3">
			<button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addHerramienta">Agregar una herramienta</button>
		</div>
		<div class="col-lg-3">
			<button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#bajasTemporales">Baja temporal</button>
		</div>
    <div class="col-lg-3">
      <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#entregarHerramienta">Entregar herramienta</button>
    </div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nombre herramienta</th>
					<th>Cantidad</th>
					<th></th>
          <th></th>
          <th></th>
				</tr>
			</thead>
			<tbody>
        <tr>
          <td>Nombre herramienta</td>
          <td>Cantidad</td>
          <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editHerramienta">Editar</button></td>
          <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#retirarHerramienta">Retirar</button></td>
          <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bajaTemporal">Dar baja</button></td>
        </tr>
			</tbody>
		</table>
	</div>
</section>

<!--Modals-->
<div class="modal fade" id="bajaTemporal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Baja temporal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">¿Seguro que desea dar de baja temporal la pieza?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="baja">Aceptar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="bajasTemporales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="search" name="" placeholder="Buscar bajas temporales" class="form-control">
        <br>
        <div class="table-responsive">
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th></th>
        				<th></th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
                <td>Nombre de la herramienta</td>
                <td><button class="btn btn-success">Activar</button></td>   
              </tr>
        		</tbody>
        	</table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="retirarHerramienta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Retirar herramienta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="responsable" class="form-label">Responsable</label>
          <input type="text" class="form-control" id="responsable">
        </div>
        <div class="mb-3">
          <label for="cantidad" class="form-label">Cantidad</label>
          <input type="number" min="0" class="form-control" id="cantidad">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Guardar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addHerramienta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar herramienta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
  	    	<label for="nombre" class="form-label">Nombre modelo</label>
  	    	<input type="text" class="form-control" id="nombre">
  	  	</div>
        <div class="mb-3">
          <label for="serial" class="form-label">Serial</label>
          <input type="text" class="form-control" id="serial">
        </div>
        <div class="mb-3">
          <label for="marca" class="form-label">Marca</label>
          <input type="text" class="form-control" id="marca">
        </div>
  	  	<div class="mb-3">
  	    	<label for="cantidad" class="form-label">Cantidad</label>
  	    	<input type="number" min="0" class="form-control" id="cantidad">
  	  	</div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion</label>
          <textarea class="form-control" id="descripcion"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="entregarHerramienta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Entregar herramienta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nombre herramienta</th>
                <th>Cantidad</th>
                <th>Responsable</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Nombre herramienta</td>
                <td>Cantidad</td>
                <td>Responsable</td>
                <td><button class="btn btn-primary">Entregar</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editHerramienta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar herramienta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre modelo</label>
          <input type="text" class="form-control" id="nombre">
        </div>
        <div class="mb-3">
          <label for="serial" class="form-label">Serial</label>
          <input type="text" class="form-control" id="serial">
        </div>
        <div class="mb-3">
          <label for="marca" class="form-label">Marca</label>
          <input type="text" class="form-control" id="marca">
        </div>
        <div class="mb-3">
          <label for="cantidad" class="form-label">Cantidad</label>
          <input type="number" min="0" class="form-control" id="cantidad">
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion</label>
          <textarea class="form-control" id="descripcion"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardar-e">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php 
  include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/pieza.js"></script>