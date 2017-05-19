<!--ARCHIVO PARA CONFIGURAR PERMISOLOGIAS DE USUARIOS-->
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
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                <!--si el id modulo seleccionado y el perfil de usuario correspondan segun el permiso establecido;
                ver funcion en database.php para permisologias de leer, crear, editar y eliminar-->
                    <? if(puede_crear($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                    <button class="btn btn-success" id="boton1" value="ejecutar" type="button" onclick="location.href='index.php?menu=registrar_configuracion'">Anadir Nuevo</button>
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
                        $id_modulo=$_POST['id_modulo']; 
                        $id_perfil=$_POST['id_perfil']; 
                        $bloquear_leer = isset($_POST['bloquear_leer'])? '1': '0';
                        $bloquear_crear = isset($_POST['bloquear_crear'])? '1': '0';
                        $bloquear_editar = isset($_POST['bloquear_editar'])? '1': '0';
                        $bloquear_eliminar = isset($_POST['bloquear_eliminar'])? '1': '0';

                // update de la consulta con los campos actualizar
                $sql_query = "UPDATE permisologia SET  id_modulo='$id_modulo', id_perfil='$id_perfil', bloquear_leer='$bloquear_leer', bloquear_crear='$bloquear_crear', bloquear_editar='$bloquear_editar', bloquear_eliminar='$bloquear_eliminar' WHERE id='".$_POST['id']."'"; 
                
                //ejecuta consulta
                query($sql_query);
                }
                //en el caso de que la variable recibida no sea update
                // comprueba que todos los campos hayan sido rellenados en el formulario guardar
                else if(isset($_POST['guardar'])){
                    
                    $id_modulo=$_POST['id_modulo']; 
                    $id_perfil=$_POST['id_perfil']; 
                    $bloquear_leer=$_POST['bloquear_leer'];
                    $bloquear_crear=$_POST['bloquear_crear'];  
                    $bloquear_editar=$_POST['bloquear_editar']; 
                    $bloquear_eliminar=$_POST['bloquear_eliminar']; 

                    $sql_query="INSERT INTO permisologia (id_modulo,id_perfil,bloquear_leer,bloquear_crear, bloquear_editar,bloquear_eliminar) VALUES('".$id_modulo."','".$id_perfil."', '".$bloquear_leer."','".$bloquear_crear."', '".$bloquear_editar."','".$bloquear_eliminar."')";

                    query($sql_query);

                }
                // select con inner join con modulos y perfil para traerme los valores del campo nombre perfil y nombre de modulo
                $sql = "SELECT perfil.descripcion as perfil_nombre, modulos.nombre_vista as modulo_nombre, permisologia.*  FROM permisologia inner join perfil on permisologia.id_perfil = perfil.id_perfil inner join modulos on permisologia.id_modulo = modulos.id_modulo";
                $result = query ($sql);
                if (! $result and ! $result){
                echo "La consulta SQL contiene errores.".mysql_error();
                exit();
                }else {
                echo "
                <div class='table-responsive'>
                <table class='table table-striped table-bordered table-hover table-condensed'>
                <tr class='success'>
                <th>Nro</th>
                <th>Tipo de Usuario</th>
                <th>Nombre del Modulo</th>
                <th>Bloquear Lectura</th>
                <th>Bloquear Crear</th>
                <th>Bloquear Editar</th>
                <th>Bloquear Eliminar</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>";
                if(num_rows($result) > 0) // numero de filas de mi result
                {
                $number = 1; // declaro variable en 1 que se ira incrementado (para enumerar cada una de mis filas)

                while ($row = fetch_array($result)){
                // recorrido de la consulta para mostrar valores de los campos
                        
                echo"</tr>
                <td>".$number."</td>
                <td>".$row['perfil_nombre']."</td>
                <td>".$row['modulo_nombre']."</td>
                <td>".$row['bloquear_leer']."</td>
                <td>".$row['bloquear_crear']."</td>
                <td>".$row['bloquear_editar']."</td>
                <td>".$row['bloquear_eliminar']."</td>";?>
                
                <!--si el id modulo seleccionado y el perfil de usuario correspondan segun el permiso establecido;
                ver funcion en database.php para permisologias de leer, crear, editar y eliminar-->

                <? if(puede_editar($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                <? echo '<td><center><a href="index.php?menu=editar_configuracion&id='.$row['id'].'">Editar</a></center></td>';?>
                <? } ?>

                <? if(puede_eliminar($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                <? echo '<td><center><a href="index.php?menu=eliminar_configuracion&id='.$row['id'].'">Eliminar</a></center></td>';?>
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

