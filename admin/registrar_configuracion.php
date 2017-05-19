<!--REGISTRAR INFORMACION PERMISOGIAS -->
<section id="main-content">
    <section class="wrapper">            
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="icon_desktop"></i><a href="index.php?menu=configuracion">Configuracion de Modulos</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>
        <!-- Content Section -->
        <div class="container">
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

                    <form method="post" action="index.php?menu=configuracion">

                        <div class="form-group">
                            <label for="modulo">Modulo</label>
                            <br>
                            <select name="id_modulo">
                                <? 
                                    $result=query("SELECT * FROM modulos");
                                    while ($row = fetch_array($result)){
                                       echo '<option value="'.$row['id_modulo'].'">'.$row['nombre'].'</option>';
                                }?>
                            </select>
                        </div>

                            <br>
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
                                    <input type="checkbox" name="bloquear_leer" value="1"> Bloquear Lectura
                                    <input type="checkbox" name="bloquear_crear" value="1"> Bloquear Crear
                                    <input type="checkbox" name="bloquear_editar" value="1"> Bloquear Editar
                                    <input type="checkbox" name="bloquear_eliminar" value="1"> Bloquear Eliminar
                                </label>
                            </div>
                            
                        <input type="submit" class="btn btn-primary" name="guardar" value="Guardar"/>

                    </form>
                    <br>
                </div>
            </div>
        </div>
        <!-- /Content Section -->
    </section> 
</section>            
