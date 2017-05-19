<section id="main-content">
+    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-user fa-fw"></i><a href="index.php?menu=usuarios">Users</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">

                     <button class="btn btn-default" type="button" onclick="location.href='index.php?menu=usuarios'">Regresar</button>

                </div>
            </div>
        </div>   

        <div class="row">
            <div class="col-md-12">
                <br>	
                  <? 
                    // check request
                    if(isset($_GET['id_usuario']))
                    {
	                    $sql_query="SELECT * FROM usuarios WHERE id_usuario=".$_GET['id_usuario'];
	                    $result_set=query($sql_query);
	                    $fetched_row=fetch_array($result_set);
                    }
                 ?>
                <form method="post" action="index.php?menu=usuarios">

                     <div class="form-group">
                        <label for="nombres">Nombre</label>
                        <input type="text" name="nombres" placeholder="Nombre" class="form-control" value="<?= $fetched_row['nombres']; ?>"/>
                          <input type="hidden" name="id_usuario" value="<?= $_GET['id_usuario']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="text" name="correo" placeholder="Correo" class="form-control" value="<?= $fetched_row['correo']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" placeholder="Usuario" class="form-control" value="<?=$fetched_row['usuario']; ?>"/>                    <div class="form-group">
                        <label for="usuario">Tipo de Usuario</label>
                        <br>
                        <select name="id_perfil">
                            <?  $id_perfil = $fetched_row['id_perfil'];
                                $result=query("SELECT * FROM perfil");
                                while ($row = fetch_array($result)){
                                    echo '<option value="'.$row['id_perfil'].'" '.(($row['id_perfil'] == $id_perfil)? 'selected' : '').'>'.$row['descripcion'].'</option>';
                                }?>
                        </select>

                    </div>
                    </div>

                    <div class="form-group">
                        <label>
                             <input type="checkbox" name="activo" <?=$fetched_row['activo']=='1'? 'checked':'' ?>/>
                			       Activo
                        </label>
                    </div>


                    <div class="form-group">
                        <label for="titulo">Clave</label>
                        <input type="password" name="clave" placeholder="Clave" class="form-control" value="<?= $fetched_row['clave']; ?>"/>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update</button>

                </form>
                <br>
            </div>
        </div>
    </section>
    <!-- /Content Section -->
</section>  