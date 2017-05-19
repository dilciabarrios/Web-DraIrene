<div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu">
      <? 
        //hacemos select modulos que se encuentren activos y por lo tanto se van a mostrar en sidebar
        $result = query ("SELECT * from modulos where activo = 1  and sidebar = 1 order by secuencia");
        $cant = num_rows($result);
        while  ($row = fetch_array($result))
        {
        	// para evaluar si el usuario tiene acceso a dicho permiso del modulo
        	if(puede_leer($row['id_modulo'], $_SESSION['id_perfil'])){ 
        		// para evaluar menu que se encuentra seleccionado en ese momento 
		         if(isset($_GET['menu']) && $_GET['menu']==$row['nombre']) { 
		             echo '<li class="active">';
		         }
		         else {
		             echo '<li>';
		         }
		         echo '    <a href="'.$row['link'].'&id_modulo='.$row['id_modulo'].'">';
		         echo '        <i class="'.$row['icono'].'"></i>';
		         echo '        <span>'.$row['nombre_vista'].'</span>';
		         echo '    </a>';
		         echo '</li>';
		      }
        }?>
    </ul> 
</div>


