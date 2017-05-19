<!--REGISTRAR INFORMACION DEL HOME DE LA PAGINA -->
<section id="main-content">
    <section class="wrapper">            
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-university"></i><a href="index.php?menu=home">Home</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                     <button class="btn btn-default" type="button" onclick="location.href='index.php?menu=home'">Regresar</button>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-12">
                <br>

                <form method="post" action="index.php?menu=home" enctype="multipart/form-data">
            
                    <div class="form-group">
                        <label for="titulo">Titulo Primario</label>
                        <input type="text" name="titulo_p" placeholder="Titulo Primario" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="contenido_p">Contenido</label>
                        <textarea class="form-control" name="contenido_p" placeholder="Contenido" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="adjuntar">Adjuntar Imagen</label>
                        <input type="file"  name="foto"  class="filestyle">
                        <p class="help-block">Maximo 50MB</p>
                    </div>
                    <div class="form-group">
                        <label for="titulo_s">Titulo Secundario</label>
                        <input type="text" name="titulo_s" placeholder="Titulo Secundario" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="contenido_s">Contenido</label>
                        <textarea class="form-control" name="contenido_s" placeholder="Contenido" cols="30" rows="10"></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" name="guardar" value="Guardar"/>


                </form>
                <br>
            </div>
        </div>
    </section> 
</section>            







