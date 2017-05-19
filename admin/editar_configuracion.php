<!--ARCHIVO PARA EDITAR PERMISOLOGIAS DE USUARIO-->
<section id="main-content">
+    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-user fa-fw"></i><a href="index.php?menu=configuracion">Configuracion de Modulos</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">

                     <button class="btn btn-default" type="button" onclick="location.href='index.php?menu=configuracion'">Regresar</button>

                </div>
            </div>
        </div>   

        <div class="row">
            <div class="col-md-12">
                <br>	
                  <?
         
                    if(isset($_GET['id']))
                    {
	                    $sql_query="SELECT * FROM permisologia WHERE id=".$_GET['id'];
	                    $result_set=query($sql_query);
	                    $fetched_row=fetch_array($result_set);
                    }
                 ?>

                <form method="post" action="index.php?menu=configuracion">
                    <!--como estamos enviando por post para que no se pierda mi id lo envio por get, en campo
                    oculto para que no se muestre en mi formulario-->
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                        <div class="form-group">
                            <label for="modulo">Modulo</label>
                            <br>
                            <select name="id_modulo">
                                <?  $id_perfil = $fetched_row['id_modulo'];
                                    $result=query("SELECT * FROM modulos");
                                    while ($row = fetch_array($result)){
                                    // hacemos uso de operador ternario para conocer el campo que se encuentra seleccionado
                                        echo '<option value="'.$row['id_modulo'].'" '.(($row['id_modulo'] == $id_modulo)? 'selected' : '').'>'.$row['nombre_vista'].'</option>';
                                    }?>
                            </select>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="usuario">Tipo de Usuario</label>
                            <br>
                            <select name="id_perfil">
                                <?  $id_perfil = $fetched_row['id_perfil'];
                                    $result=query("SELECT * FROM perfil");
                                    while ($row = fetch_array($result)){
                                    // hacemos uso de operador ternario para conocer el campo que se encuentra seleccionado
                                        echo '<option value="'.$row['id_perfil'].'" '.(($row['id_perfil'] == $id_perfil)? 'selected' : '').'>'.$row['descripcion'].'</option>';
                                    }?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="bloquear_leer" <?=$fetched_row['bloquear_leer']=='1'? 'checked':'' ?>/>Bloquear Lectura
                                <input type="checkbox" name="bloquear_crear" <?=$fetched_row['bloquear_crear']=='1'? 'checked':'' ?>/>Bloquear Crear
                                <input type="checkbox" name="bloquear_editar" <?=$fetched_row['bloquear_editar']=='1'? 'checked':'' ?>/>Bloquear Editar
                                <input type="checkbox" name="bloquear_eliminar" <?=$fetched_row['bloquear_eliminar']=='1'? 'checked':'' ?>/>Bloquear Eliminar

                            </label>
                        </div>
                            
                    <button type="submit" name="update" class="btn btn-primary">Update</button>

                </form>
                <br>
            </div>
        </div>
    </section>
    <!-- /Content Section -->
</section>  