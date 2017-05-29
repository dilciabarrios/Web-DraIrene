<?
include("admin/resources/includes/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <? include('header.php'); ?>
</head>

<body data-spy="scroll">
    <? include('navbar.php'); ?>
    
<section class="main container">

    <div class="box">
        <div class="row">
            <aside class="col-md-3 pull-right hidden-xs hidden-sm">

                    <hr>
                        <h2 class="intro-text text-center">Articulos
                            <strong>Recientes</strong>
                        </h2>
                    <hr>
                    <br>
                    <?

                   $consulta= query("SELECT DISTINCT EXTRACT(YEAR FROM fecha) AS ano FROM blog");
                  for ($i=2015; $row=fetch_array($consulta); $i++) {

                        $year = $row['ano'];

                        echo '
                        <div class="menujq list-group-item">
                            <ul>
                             <li><a href="javascript:void();">'.$row['ano'].'</a>
                              <ul>';

                              $months = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'April', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
                              foreach ($months as $month => $name) {
                                
                                $result=query("SELECT id, titulo, fecha FROM blog where YEAR(fecha)= $year and MONTH(fecha) = $month ORDER BY id DESC");
                                 $meses = num_rows($result);

                                 echo ' <li><a href="javascript:void();">'.$name.' ('.$meses.')</a>
                                          <ul>';
                                  
                                  for ($i=0;$row=fetch_array($result); $i++) {
                                 	
                                     echo '<li><a href="blogs.php?id='.$row['id'].'">'.$row['titulo'].'</a></li>';
                                 }
                                 echo ' </ul>
                                 </li>';
                              }
                                
                                echo'
                              </ul>
                             </li>
                          
                            </ul>
                        </div>';
                  
                }?>

                    <hr>
                        <h2 class="intro-text text-center">Redes
                            <strong>Sociales</strong>
                        </h2>
                    <hr>
                    <br>
                        
                    <a href="#" class="list-group-item">
                        <p class="list-group-text">Facebook</p>
                    </a>

                    <a href="#" class="list-group-item">
                        <p class="list-group-text">Instagram</p>
                    </a> 
                

            </aside>
            <section class="posts col-md-9">
            <?
              $result=query("SELECT blog.id as id_blog, blog.titulo AS titulo_blog, blog.contenido AS contenido_blog, blog.imagen AS imagen_blog, blog.autor AS autor_blog, categorias.nombre AS nombre_categoria FROM blog INNER JOIN categorias ON categorias.id_categoria = blog.id_categoria where id=".$_GET['id']);

              $row = fetch_array($result);
              echo '<div class="col-lg-12 text-center">
                      <a href="admin/imagenes_blog'.$row['imagen_blog'].'" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="admin/imagenes_blog/">
                          <img src="admin/imagenes_blog/'.$row['imagen_blog'].'" class="img-responsive" alt="img"></a>

                      <h2>
                          <br>'.$row['titulo_blog'].'<br>
                          <small> autor: '.$row['autor_blog'].'</small>
                          <small> categoria: '.$row['nombre_categoria'].'</small>
                      </h2>
                      <p>'.$row['contenido_blog'].'</p>

                      <a href="blogs.php?id='.$row['id_blog'].'" class="btn btn-default btn-lg">Read More</a>
                      <hr>
                    </div>';
              $id_blog = $row['id_blog'];
            ?>

             <nav>
                <div class="center-block" align="center">
                    <ul class="pagination"> 
                    if ()

                    <?
                    $consulta=query("SELECT min(id) as id_anterior FROM blog WHERE id>".$_GET['id']);

                    $row=fetch_array($consulta);

                    echo '<li class="enable">
                             <a href="blogs.php?id='.$row['id_anterior'].'">Anterior<span class="sr-only">Anterior</span></a>
                          </li>';

                    ?>
    
    
                    <?

                    $consulta=query("SELECT max(id) as id_proximo FROM blog WHERE id < ".$id_blog);

                    $row=fetch_array($consulta);

                    echo '<li class="enable">
                             <a href="blogs.php?id='.$row['id_proximo'].'">Siguiente<span class="sr-only">Siguiente</span></a>
                          </li>';
                    ?>

 
                  </ul>
            </nav>
        </section>'

       </div>

    </div>
</section>

    <? include('footer.php'); ?>
    <? include('scripts.php'); ?>
</body>

</html>
