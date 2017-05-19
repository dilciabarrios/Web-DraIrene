<!--REGISTRAR INFORMACION DE MIS USUARIOS -->
<section id="main-content">
    <section class="wrapper">            
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-user fa-fw"></i><a href="index.php?menu=usuarios">Users</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>
        <!-- Content Section -->
        <div class="container">
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

                    <form method="post" action="index.php?menu=usuarios">
                
                         <div class="form-group">
                            <label for="nombres">Nombre</label>
                            <input type="text" name="nombres" placeholder="Nombre" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="text" name="correo" placeholder="Correo" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="usuario" placeholder="Usuario" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Tipo de Usuario</label>
                            <br>
                            <select name="id_perfil">
                                <?  
                                    $result=query("SELECT * FROM perfil");
                                    while ($row = fetch_array($result)){
                                        echo '<option value="'.$row['id_perfil'].'">'.$row['descripcion'].'</option>';
                                    }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="activo" value="1"> Activo
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="titulo">Clave</label>
                            <input type="password" name="clave" placeholder="Clave" class="form-control"/>
                        </div>


                        <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>

                    </form>
                    <br>
                </div>
            </div>
        </div>
        <!-- /Content Section -->
    </section> 
</section>            
