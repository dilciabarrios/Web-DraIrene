<?php 

function conexion()
{
    $config=parse_ini_file("config/config.ini");

    if($config)
    {
        $host=$config['db_host'];
        $usuario=$config['db_user'];
        $clave=$config['db_pass'];
        $nombre=$config['db_name'];
    }
    
    try {
        $conexion=mysqli_connect($host,$usuario,$clave);
        $base= mysqli_select_db($conexion,$nombre);
        return $conexion;
    }
    catch (Exception $e) {
        echo "Fallo de comunicacion con la base de datos\n";
    }
}

function cerrar_conexion($conexion)
{
    try{
        mysqli_close($conexion);
    }
    catch (Exception $e) {
        echo "No se pudo cerrar sesion en la base de datos";
    }
}

function query($consulta)
{
    $conexion = conexion();
     $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
    if($consulta[0]=='i' or $consulta[0]=='I') // for insert
    { $resultado = mysqli_insert_id();}
    cerrar_conexion($conexion);
    return $resultado;

function fetch_array($resultado){
    
    try{
        $fila=mysqli_fetch_array($resultado);
        return $fila;
    }
    catch (Exception $e) {
        echo "El resultado de la consulta presenta un error";
    }
}

function num_rows($resultado){
    try{
        $fila=mysqli_num_rows($resultado);
        return $fila;
    }
    catch (Exception $e) {
        echo "El resultado de la consulta presenta un error";
    }
}

function puede_leer($id_modulo, $id_perfil){
     $sql_query = "SELECT bloquear_leer from permisologia where id_perfil='".$id_perfil."' and id_modulo='".$id_modulo."'";
     //ejecuta la consulta
     $rs = query($sql_query);
     while($permiso = fetch_array($rs)){ // guarda variable permiso
        if($permiso['bloquear_leer'] == 1){ // si permiso es igual a 1
            return false; // retorna falso, por lo tanto el usuario no podra leer
        }
     }
     return true; //retorna verdadero, por lo tanto el usuario puede leer
}
function puede_crear($id_modulo, $id_perfil){
     $sql_query = "SELECT bloquear_crear from permisologia where id_perfil='".$id_perfil."' and id_modulo='".$id_modulo."'";
     $rs = query($sql_query);
     while($permiso = fetch_array($rs)){
        if($permiso['bloquear_crear'] == 1){
            return false;
        }
     }
     return true;
}

function puede_editar($id_modulo, $id_perfil){
     $sql_query = "SELECT bloquear_editar from permisologia where id_perfil='".$id_perfil."' and id_modulo='".$id_modulo."'";
     $rs = query($sql_query);
     while($permiso = fetch_array($rs)){
        if($permiso['bloquear_editar'] == 1){
            return false;
        }
     }
     return true;
}

function puede_eliminar($id_modulo, $id_perfil){
     $sql_query = "SELECT bloquear_eliminar from permisologia where id_perfil='".$id_perfil."' and id_modulo='".$id_modulo."'";
     $rs = query($sql_query);
     while($permiso = fetch_array($rs)){
        if($permiso['bloquear_eliminar'] == 1){
            return false;
        }
     }
     return true;
}?>