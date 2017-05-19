<!--ARCHIVO DE MI ADMINISTRAR INFORMACION DE MI HOME -->
<section id="main-content">
    <section class="wrapper">            
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-university"></i><a href="index.php?menu=home">Home</a></li>
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
                    <button class="btn btn-success" id="boton1" value="ejecutar" type="button" onclick="location.href='index.php?menu=registrar_home'">Anadir Nuevo</button>
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
    		            $titulo_p = $_POST['titulo_p'];
    		            $contenido_p = $_POST['contenido_p'];
    		            $img = $_POST['img'];
                        $titulo_s = $_POST['titulo_s'];
                        $contenido_s = $_POST['contenido_s'];

                    
                    $ruta = "img_home/";
    						opendir($ruta);
    						$destino = $ruta.$_FILES['foto']['name'];
    						copy($_FILES['foto']['tmp_name'],$destino);

                        // comprueba de que se haya adjuntado una imagen nueva
        		        if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)){ 
        		        		    $nom= $_FILES['foto']['name'];
        				            
                                // de adjuntarse una imagen nueva se realizara update para el campo imagen y demas campos
        					 		$sql_query = "UPDATE home SET  titulo_p='$titulo_p', contenido_p='$contenido_p', img='$nom', titulo_s='$titulo_s', contenido_s='$contenido_s' WHERE id='".$_POST['id']."'"; 
        		        }   		
        		        else{   // en el caso de que no se haya adjuntado ninguna imagen nueva no actualizamos el campo imagen
        					 		$sql_query = "UPDATE home SET  titulo_p='$titulo_p', contenido_p='$contenido_p', titulo_s='$titulo_s', contenido_s='$contenido_s' WHERE id='".$_POST['id']."'";
        		        }
        			//ejecuta consulta
                    query($sql_query);
    			}

                //en el caso de que la variable recibida no sea update
                // comprueba que todos los campos hayan sido rellenados en el formulario guardar
                else if (isset($_POST['guardar'])){
                        
                        //nombre de mi carpeta donde guardara las imagenes 
                        $ruta = "img_home/";
                        opendir($ruta);
                        $destino = $ruta.$_FILES['foto']['name'];
                        //copia imagen en mi carpeta destino
                        copy($_FILES['foto']['tmp_name'],$destino);
                        $nombre=$_FILES['foto']['name'];

                        $nom=$_FILES['foto']['name'];
                        $titulo = $_POST['titulo_p'];
                        $contenido_p = $_POST['contenido_p'];
                        $titulo_s = $_POST['titulo_s'];
                        $contenido_s = $_POST['contenido_s'];

                        $sql_query="INSERT INTO home (titulo_p,contenido_p,img,titulo_s,contenido_s) VALUES('".$titulo_p."','".$contenido_p."','".$nom."','".$titulo_s."','".$contenido_s."')";
                //ejecuta consulta
                       query($sql_query);
                }
    	        
                $sql = "SELECT * FROM home";
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
                <th>Titulo Primario</th>
                <th>Contenido</th>
                <th>Imagen</th>
                <th>Titulo Secundario</th>
                <th>Contenido</th>
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
                <td>'.$row['titulo_p'].'</td>
                <td>'.$row['contenido_p'].'</td>
                <td>'.$row['img'].'</td>
                <td>'.$row['titulo_s'].'</td>
                <td>'.$row['contenido_s'].'</td>';?>

                <!--si el id modulo seleccionado y el perfil de usuario correspondan segun el permiso establecido;
                ver funcion en database.php para permisologias de leer, crear, editar y eliminar-->
                <? if(puede_editar($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                <? echo '<td><center><a href="index.php?menu=editar_home&id='.$row['id'].'">Editar</a></center></td>';?>
                <? } ?>

                <? if(puede_eliminar($_GET['id_modulo'], $_SESSION['id_perfil'])){ ?>
                <? echo '<td><center><a href="index.php?menu=eliminar_home&id='.$row['id'].'">Eliminar</a></center></td>';?>
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

