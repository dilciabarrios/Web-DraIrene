   <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
    				<div class="row">
    					<div class="col-lg-12">
    						<h3 class="page-header"><i class="fa fa-laptop"></i> Bienvenido  <small>
    						<?php echo $_SESSION['nombres'];?><small></h3> 
    						<ol class="breadcrumb">
    							<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
    							<li><i class="fa fa-laptop"></i>Panel de Control</li>						  	
    						</ol>
    					</div>
    				</div>
			      
			       <? 
			       //hacemos select modulos que se encuentren activos y por lo tanto se van a mostrar en sidebar
			        $result = query ("SELECT * from modulos where activo = 1  and sidebar = 1 order by secuencia");
			        while  ($row = fetch_array($result)) 
			            { 
			            	// para evaluar si el usuario tiene acceso a dicho permiso del modulo
                    if(puede_leer($row['id_modulo'], $_SESSION['id_perfil'])){
				            	echo'
				      				<div class="panel">
				                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				                  <div class="'.$row['color'].'">
				                    <i class="'.$row['icono'].'"></i>
				                        <a class="" href="'.$row['link'].'">
				                          <div class="count">'.$row['nombre_vista'].'</div>
				                        </a>
				                  </div>  
				                </div>';
			                }
			            }?>
          </section>
      </section>