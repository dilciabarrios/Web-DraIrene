<!--ARCHIVO DE MI ADMINISTRAR INFORMACION DE USUARIOS DEL SISTEMA -->
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
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                <!--si el id modulo seleccionado y el perfil de usuario correspondan segun el permiso establecido;
                ver funcion en database.php para permisologias de leer, crear, editar y eliminar-->
                    <button class="btn btn-success" id="boton1" value="ejecutar" type="button" onclick="location.href='index.php?menu=registrar_usuarios'">Anadir Nuevo</button>
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
                { //var_dump($_POST);
                        $nombres=$_POST['nombres']; 
                        $correo=$_POST['correo']; 
                        $usuario=$_POST['usuario'];
                        $id_perfil=$_POST['id_perfil']; 
                        $clave=$_POST['clave'];
                        $activo = isset($_POST['activo'])? '1': '0';
                    
                // update de la consulta con los campos actualizar
                $sql_query = "UPDATE usuarios SET  nombres='$nombres', correo='$correo', usuario='$usuario', clave='$clave', activo='$activo',id_perfil= '$id_perfil' WHERE id_usuario='".$_POST['id_usuario']."'"; 
                //ejecuta consulta
                query($sql_query);
                }
                //en el caso de que la variable recibida no sea update
                // comprueba que todos los campos hayan sido rellenados en el formulario guardar
                else if(isset($_POST['guardar'])){
       

                        $nombres=$_POST['nombres']; 
                        $correo=$_POST['correo']; 
                        $usuario=$_POST['usuario']; 
                        $clave=$_POST['clave'];
                        $id_perfil=$_POST['id_perfil']; 
                        $activo=$_POST['activo'];  

                    $sql_query= "INSERT INTO usuarios (nombres,correo, usuario, clave, activo,id_perfil) VALUES('".$nombres."','".$correo."', '".$usuario."','".$clave."','".$activo."','".$id_perfil."')";
                //ejecuta consulta
                query($sql_query);


                }

                $sql = "SELECT perfil.descripcion as descripcion_perfil,usuarios.* FROM usuarios inner join perfil on usuarios.id_perfil = perfil.id_perfil";
                $result = query ($sql);
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
                <th>Correo</th>
                <th>Usuario</th>
                <th>Tipo de Usuario</th>
                <th>Activo</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>";
                if(num_rows($result) > 0) // numero de filas de mi result
                {
                $number = 1; // declaro variable en 1 que se ira incrementado (para enumerar cada una de mis filas)

                while ($row = fetch_array($result)){
                // recorrido de la consulta para mostrar valores de los campos

                echo "</tr>
                <td>".$number."</td>
                <td>".$row['nombres']."</td>
                <td>".$row['correo']."</td>
                <td>".$row['usuario']."</td>
                <td>".$row['descripcion_perfil']."</td>
                <td>".$row['activo']."</td>
                <td><center><a href='index.php?menu=editar_usuarios&id_usuario=".$row['id_usuario']."'>Editar</a></center></td>
                <td><center><a href='index.php?menu=eliminar_usuarios&id_usuario=".$row['id_usuario']."'>Eliminar</a></center></td>
                </tr>";
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

