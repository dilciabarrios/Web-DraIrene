<!--ARCHIVO PARA EDITAR INFORMACION DE MI HOME -->
<section id="main-content">
    <section class="wrapper">            
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-university"></i><a href="index.php?menu=about">About</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                     <button class="btn btn-default" type="button" onclick="location.href='index.php?menu=about'">Regresar</button>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-12">
                <br>    
                  <? 
                   
                    if(isset($_GET['id']))
                    {
                    $sql_query="SELECT * FROM about WHERE id=".$_GET['id'];
                    $result_set=query($sql_query);
                    $fetched_row=fetch_array($result_set);
                    }
                 ?>
                <form method="post" action="index.php?menu=about" enctype="multipart/form-data">
                    <!--como estamos enviando por post para que no se pierda mi id lo envio por get, en campo
                    oculto para que no se muestre en mi formulario-->
                    <input type="hidden" name="id" value="<?=$_GET['id']; ?>"/>

                    <div class="form-group" >
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo_p" placeholder="Titulo Primario" class="form-control" value="<?= $fetched_row['titulo_p']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea class="form-control" name="contenido_p" placeholder="Contenido" cols="30" rows="10"/><?=$fetched_row['contenido_p']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="adjuntar">Adjuntar Imagen</label>
                        <input type="file"  name="foto"  class="filestyle">
                        <p class="help-block">Maximo 50MB</p>
                    </div>


                    <button type="submit" name="update" class="btn btn-primary">Update</button>

                </form>
                <br>
            </div>
        </div>
    </section> 
</section>            







