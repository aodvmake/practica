<?php 
  include('../../controllers/sesionadm.php');
  include('../bases/baseH.php');
?>
<meta charset="utf-8">
<section class="container pt-5 pb-5">
	<div class="row">
		<div class="col-lg-6">
			<input type="search" name="" id="busqueda" placeholder="Buscar empresa" class="form-control">
		</div>
		<div class="col-lg-3">
			<button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addEmpresa">Agregar una empresa</button>
		</div>
		<div class="col-lg-3">
			<button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#bajasTemporales">Baja temporal</button>
		</div>
	</div>
<!--empresa-->
	<div class="table-responsive" >
       <table class="table table-striped">
          <thead>
           <tr>
            <th>Nombre de la empresa</th>
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
<div class="modal fade" id="deleteEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Baja temporal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">¿Seguro que desea dar de baja temporal la empresa?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="baja" value="">Aceptar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<form method="POST" action="../../controllers/empresaController.php" >
 <div class="modal fade" id="bajasTemporales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="search" name="" placeholder="Buscar bajas temporales" class="form-control" id="buscabaja">
        <br>
        
        <table class="table table-striped">
        <thead>
          <tr>
           <th>Nombre de la empresa </th>
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
</form>

<div class="modal fade" id="addEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar empresa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
	    	<label for="nombre" class="form-label">Nombre de la empresa</label>
	    	<input type="text" class="form-control" id="nombre" maxlength="50">
	  	</div>
	  	<div class="mb-3">
	    	<label for="telefono" class="form-label">Telefono</label>
	    	<input type="number" class="form-control" id="telefono" maxlength="10">
	  	</div>
	  	<div class="mb-3">
	    	<label for="email" class="form-label">Correo de la empresa</label>
	    	<input type="email" class="form-control" id="email" maxlength="50">
	  	</div>
	  	<div class="mb-3">
	    	<label for="ubicacion" class="form-label">Ubicación</label>
	    	<input type="text" class="form-control" id="ubicacion" maxlength="256">
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar empresa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_empresa" id="id_Empresa" maxlength="50">
       <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de la empresa</label>
        <input type="text" class="form-control" id="nombre_edit">
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="number" class="form-control" id="telefono_edit" maxlength="10">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo de la empresa</label>
        <input type="email" class="form-control" id="email_edit" maxlength="50">
      </div>
      <div class="mb-3">
        <label for="ubicacion" class="form-label">Ubicación</label>
        <input type="text" class="form-control" id="ubicacion_edit" maxlength="256">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardar-e" value="">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php 
  include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/empresa.js"></script>