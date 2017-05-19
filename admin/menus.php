<!--ARCHIVO DE MI ADMINISTRAR INFORMACION DEL MENU DE LA PAGINA -->
<section id="main-content">
    <section class="wrapper">            
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-bars"></i><a href="index.php?menu=menus">Menu</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                <!--si el id modulo seleccionado y el perfil de usuario correspondan segun el permiso establecido;
                ver funcion en database.php para permisologias de leer, crear, editar y eliminar-->
                    <? if(puede_crear($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                    <button class="btn btn-success" id="boton1" value="ejecutar" type="button" onclick="location.href='index.php?menu=registrar_menus'">Anadir Nuevo</button>
                    <? } ?>
                     <button class="btn btn-default" type="button" onclick="location.href='index.php'">Regresar</button>
                </div>
            </div>
        </div> 
        <br>  
        <div class="row">
            <div class="container">

                <? 
                // comprueba que todos los campos hayan sido rellenados en el formulario de editar
                if(isset($_POST['update']))
                {
                            $nombre=$_POST['nombre']; 
                            $pagina=$_POST['pagina']; 
                            $estado = isset($_POST['estado'])? '1': '0';

                // update de la consulta con los campos actualizar
                $sql_query = "UPDATE menus SET  nombre='$nombre',pagina='$pagina', estado='$estado' WHERE id='".$_POST['id']."'";
                //ejecuta consulta
                query($sql_query);
                }
                //en el caso de que la variable recibida no sea update
                // comprueba que todos los campos hayan sido rellenados en el formulario guardar
                else if (isset($_POST['guardar'])){

                    $nombre=$_POST['nombre'];
                    $pagina=$_POST['pagina'];
                    $estado=$_POST['estado']; 

                    $sql_query="INSERT INTO menus (nombre,pagina,estado) VALUES('".$nombre."','".$pagina."','".$estado."')";

                    //ejecuta consulta
                    query($sql_query);

                }

                $sql = "SELECT * FROM menus ORDER BY id ASC";
                $result =query ($sql);
                if (! $result){
                echo "La consulta SQL contiene errores.".mysql_error();
                exit();
                }else {
                echo "
                <div class='table-responsive'>
                <table class='table table-striped table-bordered table-hover table-condensed'>
                <tr class='success'>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Pagina</th>
                <th>Activo</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>";
                if(num_rows($result) > 0) // numero de filas de mi result
                {
                $number = 1;// declaro variable en 1 que se ira incrementado (para enumerar cada una de mis filas)

                while ($row =fetch_array($result)){ 
                // recorrido de la consulta para mostrar valores de los campos

                echo'</tr>
                <td>'.$number.'</td>
                <td>'.$row['nombre'].'</td>
                <td>'.$row['pagina'].'</td>
                <td>'.$row['estado'].'</td>';?>

                <!--si el id modulo seleccionado y el perfil de usuario correspondan segun el permiso establecido;
                ver funcion en database.php para permisologias de leer, crear, editar y eliminar-->

                <? if(puede_editar($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                <? echo '<td><center><a href="index.php?menu=editar_menus&id='.$row['id'].'">Editar</a></center></td>';?>
                <? } ?>

                <? if(puede_eliminar($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                <? echo '<td><center><a href="index.php?menu=eliminar_menus&id='.$row['id'].'">Eliminar</a></center></td>';?>
                <? } ?>
                

                <? echo "</tr>";
                $number++;
                }
                }
                }
                ?> 

                </table>
            </div>
        </div>
    </section> 
</section>            
