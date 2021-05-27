<?php 
  include('../../controllers/sesionadm.php');
  include('../bases/baseH.php');
?>

<section class="container pt-5 pb-5">
	<div class="row">
		<div class="col-lg-6">
			<input type="search" name="" placeholder="Buscar pieza" id="busqueda" class="form-control">
		</div>
		<div class="col-lg-3">
			<button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addPieza">Agregar una pieza</button>
		</div>
		<div class="col-lg-3">
			<button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#bajasTemporales">Baja temporal</button>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nombre de la Pieza</th>
					<th>Precio</th>
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
<div class="modal fade" id="deletePieza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <input type="search" name="" placeholder="Buscar bajas temporales" class="form-control" id="buscabaja" >
        <br>
        <div class="table-responsive">
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th></th>
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

<div class="modal fade" id="addPieza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar pieza</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
  	    	<label for="nombre" class="form-label">Nombre de la pieza</label>
  	    	<input type="text" class="form-control" id="nombre_add">
  	  	</div>
  	  	<div class="mb-3">
  	    	<label for="precio" class="form-label">Precio</label>
  	    	<input type="number" min="0" class="form-control" id="precio_add" pattern="^\d*(\.\d{0,2})?$">
  	  	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editPieza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar pieza</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <input type="hidden" name="id_pieza" id="id_pieza">
        <div class="mb-3">
  	    	<label for="nombre" class="form-label">Nombre de la pieza</label>
  	    	<input type="text" class="form-control" id="nombre_edit">
  	  	</div>
  	  	<div class="mb-3">
  	    	<label for="precio" class="form-label">Precio</label>
  	    	<input type="number" min="0" class="form-control" id="precio_edit" pattern="^\d*(\.\d{0,2})?$">
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