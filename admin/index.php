<? include('header.php'); ?> <!--index mi pagina principal donde hago llamado de cada uno de los archivos a mostrar -->

      <aside>
      <!--sidebar start-->
        <?
        include("sidebar.php");
        ?>
      </aside>
      <!--sidebar de end-->

    <?

//se redicciona a la pagina segun la opcion de menu seleccionada

    if(!isset($_GET['menu'])){

        include ("panel.php");
    }
    else { 

        switch ($_GET['menu']) {
        
        case "slider":
            include("slider.php");
            break;
        case "registrar_slider":
            include("registrar_slider.php");
            break;
        case "editar_slider":
            include("editar_slider.php");
            break;
        case "eliminar_slider":
            include("eliminar_slider.php");
            break;
        case "home":
            include("home.php");
            break;
        case "registrar_home":
            include("registrar_home.php");
            break;
        case "editar_home":
            include("editar_home.php");
            break;
        case "eliminar_home":
            include("eliminar_home.php");
            break;
        case "about":
            include("about.php");
            break;
        case "registrar_about":
            include("registrar_about.php");
            break;
        case "editar_about":
            include("editar_about.php");
            break;
        case "eliminar_about":
            include("eliminar_about.php");
            break;
        case "blog":
            include("blog.php");
            break;
        case "registrar_blog":
            include("registrar_blog.php");
            break;
        case "editar_blog":
            include("editar_blog.php");
            break;
        case "eliminar_blog":
            include("eliminar_blog.php");
            break;
        case "usuarios":
            include("usuarios.php");
            break;
        case "registrar_usuarios":
            include("registrar_usuarios.php");
            break;
        case "editar_usuarios":
            include("editar_usuarios.php");
            break;
        case "eliminar_usuarios":
            include("eliminar_usuarios.php");
            break;
        case "menus":
            include("menus.php");
            break;
        case "registrar_menus":
            include("registrar_menus.php");
            break;
        case "editar_menus":
            include("editar_menus.php");
            break;
        case "eliminar_menus":
            include("eliminar_menus.php");
            break;
        case "configuracion":
            include("configuracion.php");
            break;
        case "registrar_configuracion":
            include("registrar_configuracion.php");
            break;
        case "editar_configuracion":
            include("editar_configuracion.php");
            break;
        case "eliminar_configuracion":
            include("eliminar_configuracion.php");
            break;
            }
      }?>

<? include('footer.php'); ?>