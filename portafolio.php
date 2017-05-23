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
                        $result=query("SELECT * FROM portafolio");
                        while($row = fetch_array($result)) {

                       echo' <a href="blogs.php?id='.$row['id'].'" class="list-group-item">
                            <p class="list-group-text">'.$row['fecha'].'</p>
                            <p>'.$row['titulo'].'</p>
                        </a>';
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
                $result=query("SELECT portafolio.id as id_portafolio, portafolio.titulo AS titulo_portafolio, portafolio.contenido AS contenido_portafolio, portafolio.imagen AS imagen_portafolio, portafolio.autor AS autor_portafolio, portafolio.id AS id_portafolio, categorias.nombre AS nombre_categoria FROM portafolio INNER JOIN categorias ON categorias.id_categoria = portafolio.id_categoria ORDER BY id DESC LIMIT 3");
                $contador= 1;
                while($row = fetch_array($result)) 
                { echo '
                <section class="posts col-md-9">

                     <div class="col-lg-12 text-center">
                        <a href="admin/imagenes_portafolio'.$row['imagen_portafolio'].'" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="admin/imagenes_portafolio/">
                            <img src="admin/imagenes_portafolio/'.$row['imagen_portafolio'].'" class="img-responsive" alt="img"></a>;

                        <h2>'.$row['titulo'].'
                            <br>
                            <small> autor: '.$row['autor_portafolio'].'</small>
                            <small> categoria: '.$row['nombre_categoria'].'</small>
                        </h2>
                        <p>'.$row['contenido_portafolio'].'</p>

                        <a href="blogs.php?id='.$row['id_portafolio'].'" class="btn btn-default btn-lg">Read More</a>
                        <hr>
                    </div> 
                </section>';}?> 
       </div>
            <nav>
                <div class="center-block" align="center">
                    <ul class="pagination">
                        <li class="disabled"><a href="#">&laquo;<span class="sr-only">Anterior</span></a></li>
                        <?
                        $result= query("SELECT * FROM portafolio");
                        for($i=0; $row = fetch_array($result); $i++){
                        	if($i=0){
                        		echo '<li class="active"><a href="portafolio.php">'.$i.'</a></li>';
                        	}
                            else{
                        		echo '<li><a href="blogs.php?id='.$row['id'].'">'.$i.'</a></li>';
                            }
                        }?>
                        <li class="disabled"><a href="#">&raquo;<span class="sr-only">Siguiente</span></a></li>
                    </ul>
                </div>
            </nav>
    </div>
</section>

    <? include('footer.php'); ?>
    <? include('scripts.php'); ?>
</body>

</html>

