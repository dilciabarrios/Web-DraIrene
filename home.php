    <div class="container">

		<div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
			                  <? $result=query("SELECT * FROM slider");
			                    $rows = num_rows($result);
														echo '<ol class="carousel-indicators hidden-xs">';
								                    for ($i=0; $i<$rows; $i++) {
									                    if ($i == 0) {
									                    	echo '<li data-target="#carousel-example-generic" data-slide-to="0"></li>';} 
									                    else {
									                    	echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';}
									                   }
														echo '</ol>';
			                  ;?>
                        <!--generar dinamicamente imagenes del slider -->
                        <div class="carousel-inner">
		                        <?
		                        $ruta = "admin/img_slider/";
		                        while($row = fetch_array($result))
		                        { echo'<div class="">
		                        <img class="img-responsive img-full" src="admin/img_slider/'.$row['imagen'].'" alt="">
		                        </div>';}
		                        ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Business Casual</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>Start Bootstrap</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <!--generar dinamicamente seccion del portafolio -->
                    <?
                    $result=query("SELECT * FROM home");
                    while($row = fetch_array($result)) 
                    { echo' 

                    <h2 class="intro-text text-center">'.$row['titulo_p'].'</h2>
                    <hr> 
                    <img src="admin/img_home/'.$row['img'].'" class="img-responsive" alt="img" align="left">
                    <p>'.$row['contenido_p'].'</p>';}?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <?
                    $result=query("SELECT * FROM home");
                    while($row = fetch_array($result)) 
                    { echo' 
                    <h2 class="intro-text text-center">'.$row['titulo_s'].'</h2>
                    <hr>
                    <p>'.$row['contenido_s'].'</p>';}?>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->