<?php
  include('../../controllers/sesionadm.php'); 
  include('../bases/baseH.php');
?>

<section class="container pt-5 pb-5">
	<div class="row">
		<div class="col-lg-6">
			<input type="search" name="" placeholder="Buscar herramienta" class="form-control" id="busqueda">
		</div>
		<div class="col-lg-2">
			<button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addHerramienta">Agregar una herramienta</button>
		</div>
		<div class="col-lg-2">
			<button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#bajasTemporales">Baja temporal</button>
		</div>
    <div class="col-lg-2">
      <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#entregarHerramienta" id="btnentrega">Entregar herramienta</button>
    </div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Inventariado</th>
          <th>Cantidad</th>
          <th></th>
          <th></th>
          <th></th>
				</tr>
			</thead>
			<tbody id="resultados">

			</tbody>
		</table>
	</div>
</section>

<!--Modals-->
<div class="modal fade" id="deleteHerramienta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Baja temporal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">¿Seguro que desea dar de baja temporal la herramienta?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="baja" >Aceptar</button>
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
        <input type="search" name="" id="buscabaja" placeholder="Buscar bajas temporales" class="form-control">
        <br>
        <div class="table-responsive">
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th>Modelo</th>
        				<th>Marca</th>
                <th>Cantidad</th>
                <th></th>
        			</tr>
        		</thead>
        		<tbody id="bajasresultado">

        		</tbody>
        	</table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="entregarHerramienta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Cantidad retirada</th>
                <th>Responsable</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody id="entregas">
             
            </tbody>
          </table>
        </div>
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
          <label for="nombre" class="form-label">Nombre del modelo</label>
          <input type="text" class="form-control" id="nombre_h">
        </div>
        <div class="mb-3">
          <label for="serial" class="form-label">Serial</label>
          <input type="text" class="form-control" id="serial_h">
        </div>
        <div class="mb-3">
          <label for="marca" class="form-label">Marca</label>
          <input type="text" class="form-control" id="marca_h">
        </div>
        <div class="mb-3">
          <label for="cantidad" class="form-label">Cantidad</label>
          <input type="number" min="0" class="form-control" id="cantidad_h">
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion_h"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
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
        <input type="hidden" name="id_herramienta" id="id_herramienta">
        <div class="mb-3">
  	    	<label for="nombre" class="form-label">Nombre del modelo</label>
  	    	<input type="text" class="form-control" id="nombre_edit">
  	  	</div>
        <div class="mb-3">
          <label for="serial" class="form-label">Serial</label>
          <input type="text" class="form-control" id="serial_edit">
        </div>
        <div class="mb-3">
          <label for="marca" class="form-label">Marca</label>
          <input type="text" class="form-control" id="marca_edit">
        </div>
        <div class="mb-3">
          <label for="cantidad" class="form-label">Cantidad</label>
          <input type="number" min="0" class="form-control" id="cantidad_edit">
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion_edit"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardar-edit">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
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
          <label for="nombre" class="form-label">Responsable</label>
          <input type="text" class="form-control" id="nombre_retirar">
        </div>
        <div class="mb-3">
          <label for="cantidad" class="form-label">Cantidad</label>
          <input type="number" min="0" class="form-control" id="cantidad_retirar">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="retirar">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php 
  include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/inventario.js"></script>