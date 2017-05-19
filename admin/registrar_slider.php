<section id="main-content">
    <section class="wrapper">            
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-picture-o"></i><a href="index.php?menu=slider">Slider Home</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                     <button class="btn btn-default" type="button" onclick="location.href='index.php?menu=slider'">Regresar</button>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-12">
                <br>

                <form method="post" action="index.php?menu=slider" enctype="multipart/form-data">
            
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" placeholder="Titulo Imagen" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="adjuntar">Adjuntar Imagen</label>
                        <input type="file"  name="foto"  class="filestyle">
                        <p class="help-block">Maximo 50MB</p>
                    </div>

                    <input type="submit" class="btn btn-primary" name="guardar" value="Guardar"/>


                </form>
                <br>
            </div>
        </div>
    </section> 
</section>            







