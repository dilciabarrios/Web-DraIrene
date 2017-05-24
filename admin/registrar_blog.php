<!--REGISTRAR INFORMACION DE PORTAFOLIO DE LA PAGINA -->
<section id="main-content">
    <section class="wrapper">            
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-picture-o"></i><a href="index.php?menu=blog">Blog</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                     <button class="btn btn-default" type="button" onclick="location.href='index.php'">Regresar</button>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-12">
                <br>
                
                
                <form method="post" action="index.php?menu=blog" enctype="multipart/form-data">
            
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" placeholder="Titulo" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea class="form-control" name="contenido" placeholder="Contenido" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <select name="id_categoria">
                            <?  $result=query("SELECT * FROM categorias");
                                while ($row = fetch_array($result)){
                                    echo '<option value="'.$row['id_categoria'].'">'.$row['nombre'].'</option>';
                            }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="adjuntar">Adjuntar Imagen</label>
                        <input type="file"  name="foto"  class="filestyle">
                        <p class="help-block">Maximo 50MB</p>
                    </div>

                    <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>


                </form>
                <br>
            </div>
        </div>
    </section> 
</section>            






