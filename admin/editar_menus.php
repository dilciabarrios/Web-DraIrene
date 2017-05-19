<!--ARCHIVO PARA EDITAR MENUS DE MI PAGINA -->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-bars"></i><a href="index.php?menu=menus">Menu</a></li>
                    <li><i class=""></i>Panel de Control</li>                           
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">

                     <button class="btn btn-default" type="button" onclick="location.href='index.php?menu=menus'">Regresar</button>

                </div>
            </div>
        </div>   

        <div class="row">
            <div class="col-md-12">
                <br>	
                  <? 
                 
                    if(isset($_GET['id']))
                    {
	                    $sql_query="SELECT * FROM menus WHERE id=".$_GET['id'];
	                    $result_set=query($sql_query);
	                    $fetched_row=fetch_array($result_set);
                    }
                 ?>
                <form method="post" action="index.php?menu=menus">
                    <!--como estamos enviando por post para que no se pierda mi id lo envio por get, en campo
                    oculto para que no se muestre en mi formulario-->
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

                     <div class="form-group">
                        <label for="nombres">Nombre</label>
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control" value="<?= $fetched_row['nombre']; ?>"/>

                    </div>
                    <div class="form-group">
                        <label for="pagina">Pagina</label>
                        <input type="text" name="pagina" placeholder="Pagina" class="form-control" value="<?= $fetched_row['pagina']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>
                             <input type="checkbox" name="estado" <?=$fetched_row['estado']=='1'? 'checked':'' ?>/>
                			       Activo
                        </label>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update</button>

                </form>
                <br>
            </div>
        </div>
    </section>
    <!-- /Content Section -->
</section>  