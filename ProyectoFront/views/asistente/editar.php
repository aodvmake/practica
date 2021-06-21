      <?php
  include('../../controllers/sesionasistente.php');
  include('../bases/baseHasistente.php');
      ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <form>
      <div class="container">
      <div class="content">
      <div class="card-body px-lg-5 pt-0">

        <h2>Actualizar datos generales</h2>
       
            <label for="name_p">Nombre</label>
            <input type="text" class="form-control" name="name_p" id="nombre" maxlength="50">

            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" onkeypress="return soloNumeros(event);" maxlength="10">


            <label for="domicilio">Domicilio</label>
            <input type="text" class="form-control" name="domicilio" id="direccion" maxlength="50">
  
            <label for="pass">Password</label>
            <input type="password" class="form-control" name="pass" id="pass" maxlength="25">
            
            <div class="form-group">
            <div class="form-row">
            <div class="col 2">
            <label for="password">Nueva Contraseña</label>
            <input name="usuario_password" type="password" value="" class="form-control" id="contrasena">
            </div>
            <div class="col">
            <label for="password"></label>
      <!-- checkbox que nos permite activar o desactivar la opcion-->
            <div style="margin-top:15px;">
            <input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
          &nbsp;&nbsp;Mostrar Contraseña</div>
            </div>
            </div>
            </div>
            </div>
            <br>

            <div class="row">
              <div class="col">
                <button class="btn btn-primary" type="submit" name="enviar" id="enviar">Actualizar</button>
              </div>
            </div>
      </div>    
    </div>
  </div>
  </form>
<?php 
  include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/editar.js"></script>