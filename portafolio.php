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

                       echo' <a href="#" class="list-group-item">
                            <p class="list-group-text">'.$row['fecha'].'</p>
                            <p>'.$row['titulo'].'</p>
                        </a>';
                         } 
                        echo' 
                        <br>
                        <a href="#" class="btn btn-default btn-lg">Read More</a>';
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
                $result=query("SELECT * FROM portafolio ORDER BY id DESC LIMIT 3");
                $contador= 1;
                while($row = fetch_array($result)) 
                { echo '
                <section class="posts col-md-9">

                     <div class="col-lg-12 text-center">
                        <a href="admin/imagenes_portafolio'.$row['imagen'].'" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="admin/imagenes_portafolio/">
                            <img src="admin/imagenes_portafolio/'.$row['imagen'].'" class="img-responsive" alt="img"></a>;

                        <h2>'.$row['titulo'].'
                            <br>
                            <small> autor: '.$row['nombre'].'</small>
                            <small> categoria: '.$row['categoria'].'</small>
                        </h2>
                        <p>'.$row['contenido'].'</p>

                        <a href="#" class="btn btn-default btn-lg">Read More</a>
                        <hr>
                    </div> 
                </section>';}?> 
       </div>
            <nav>
                <div class="center-block" align="center">
                    <ul class="pagination">
                        <li class="disabled"><a href="#">&laquo;<span class="sr-only">Anterior</span></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
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
