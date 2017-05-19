<!--ARCHIVO DE MI ADMINISTRAR INFORMACION DE MI SLIDER -->
<section id="main-content">
    <section class="wrapper">            
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-picture-o"></i><a href="index.php?menu=slider">Slider Home</a></li>
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
                    <button class="btn btn-success" id="boton1" value="ejecutar" type="button" onclick="location.href='index.php?menu=registrar_slider'">Anadir Nuevo</button>
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
    		            $titulo = $_POST['titulo'];
    		            $imagen = $_POST['imagen'];
                    
                    $ruta = "img_slider/";
    								opendir($ruta);
    								$destino = $ruta.$_FILES['foto']['name'];
    								copy($_FILES['foto']['tmp_name'],$destino);

    				        if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)){ 
    				        		    $nom= $_FILES['foto']['name'];

    							// de adjuntarse una imagen nueva se realizara update para el campo imagen y demas campos
    							 		$sql_query = "UPDATE slider SET  titulo='$titulo', imagen='$imagen' WHERE id='".$_POST['id']."'"; 
    				        }   		
    				        else{ // en el caso de que no se haya adjuntado ninguna imagen nueva no actualizamos el campo imagen
    							 		$sql_query = "UPDATE slider SET  titulo='$titulo' WHERE id='".$_POST['id']."'";
    				        }
    							//ejecuta consulta
                                query($sql_query);
    			}

                //en el caso de que la variable recibida no sea update
                // comprueba que todos los campos hayan sido rellenados en el formulario guardar

                else if(isset($_POST['guardar'])){

                $ruta = "img_slider/";
                opendir($ruta);
                $destino = $ruta.$_FILES['foto']['name'];
                copy($_FILES['foto']['tmp_name'],$destino);


                $titulo = $_POST['titulo'];
                $imagen=$_FILES['foto']['name'];

                $sql_query="INSERT INTO slider (titulo,imagen) VALUES('".$titulo."','".$imagen."')";

                query($sql_query);

                }
   	
                $sql = "SELECT * FROM slider";
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
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>";


                if(num_rows($result) > 0) // numero de filas de mi result
                {
                $number = 1; // declaro variable en 1 que se ira incrementado (para enumerar cada una de mis filas)

                while ($row =fetch_array($result)){
                 // recorrido de la consulta para mostrar valores de los campos 

                echo '
                </tr>
                <td>'.$number.'</td>
                <td>'.$row['titulo'].'</td>
                <td>'.$row['imagen'].'</td>';?>

                <!--si el id modulo seleccionado y el perfil de usuario correspondan segun el permiso establecido;
                ver funcion en database.php para permisologias de leer, crear, editar y eliminar-->

                <? if(puede_editar($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                <? echo '<td><center><a href="index.php?menu=editar_slider&id='.$row['id'].'">Editar</a></center></td>';?>
                <? } ?>

                <? if(puede_eliminar($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                <? echo '<td><center><a href="index.php?menu=eliminar_slider&id='.$row['id'].'">Eliminar</a></center></td>';?>
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
