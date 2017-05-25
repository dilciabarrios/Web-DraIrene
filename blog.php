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

					            $num_rows= 1; // definimos variable de cuantos resultados se van a mostrar por pagina

					            if (isset($_GET['pagina'])){ //examinamos en este caso nuestra pagina a mostrar
					                $pagina = $_GET['pagina'];
					            }
					            else{
					                $pagina= 1; // sentencia else para definir nuestro valor de inicio
					            }

					              $ubicacion = ($pagina -1)* $num_rows; //calculamos el desplazamiento para nuestra consulta
					              //ubicacion de nuestro nro de pagina primer caso ubicacion= 2-1*1 = 1 pagina / 1(elemento a mostrar)
					              //la pagina 1 va hacer nuestro inicio

                        $result=query("SELECT * FROM blog ORDER BY id DESC LIMIT 6");
                        for ($i=1; $row=fetch_array($result); $i++) { 

	                       echo' <a href="blog.php?pagina='.$i.'" class="list-group-item">
				                            <p class="list-group-text">'.$row['fecha'].'</p>
				                            <p>'.$row['titulo'].'</p>
				                            </a>
				                        ';
	                         } 
	                        echo' 
	                        <br>
	                        <a href="" class="btn btn-default btn-lg">Read More</a>';

                   ?>   


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
            <?

                $result=query("SELECT blog.id as id_blog, blog.titulo AS titulo_blog, blog.contenido AS contenido_blog, blog.imagen AS imagen_blog, blog.autor AS autor_blog, blog.id AS id_blog, categorias.nombre AS nombre_categoria FROM blog INNER JOIN categorias ON categorias.id_categoria = blog.id_categoria ORDER BY id DESC LIMIT $ubicacion, $num_rows");


                for ($i=1; $row=fetch_array($result); $i++) 
                { echo '
                <section class="posts col-md-9">

                     <div class="col-lg-12 text-center">
                        <a href="admin/imagenes_blog'.$row['imagen_blog'].'" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="admin/imagenes_blog/">
                            <img src="admin/imagenes_blog/'.$row['imagen_blog'].'" class="img-responsive" alt="img"></a>;

                        <h2>'.$row['titulo_blog'].'
                            <br>
                            <small> autor: '.$row['autor_blog'].'</small>
                            <small> categoria: '.$row['nombre_categoria'].'</small>
                        </h2>
                        <p>'.$row['contenido_blog'].'</p>

                        <a href="blog.php?pagina='.$i.'" class="btn btn-default btn-lg">Read More</a>
                        <hr>
                    </div>  ';}?>

             <nav>
                <div class="center-block" align="center">
                    <ul class="pagination"> 
    
                    <?
	                  			
	                        $result= query("SELECT * FROM blog");
	                        $total_filas= num_rows($result); // total nro de filas de mi tabla blog
	                        $total_pagina=ceil($total_filas/$num_rows); //total de paginas a mostrar ceil para redondear

	                        //anadimos valores a nuestros botones
	                        $prev = $pagina -1;
	                        $next = $pagina +1;

	                        if ($prev >0){
	                        	echo "<li><a href='blog.php?pagina=".$prev."' title='Anterior'>".'Anterior'."</a></li>";

	                          echo '<li class="enable"><a href="blog.php?pagina='.$prev.'">&laquo;<span class="sr-only">Anterior</span></a></li>';
	                        }
	                        //mostrar el resultado de paginas de nuestra base de datos
	                        for ($i=1; $i <$total_pagina; $i++) { 
	                            echo "<li><a href='blog.php?pagina=$i' title='Abrir pagina'>" . '&nbsp;&nbsp' .$i."</a></li>";
	                        }

	                        if ($pagina < $total_filas){
                             echo '<li class="enable"><a href="blog.php?pagina='.$next.'">&raquo;<span class="sr-only">Siguiente</span></a></li>';
                             echo "<li><a href='blog.php?pagina=$total_pagina' title='Ir a la ultima pagina'>".'Ultima'."</a></li>";
	                        }
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
