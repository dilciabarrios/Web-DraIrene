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
        <!-- Content Section -->
        <div class="container">
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

                    <form method="post" action="index.php?menu=menus">
                
                         <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="pagina">Nombre de la Pagina</label>
                            <input type="text" name="pagina" placeholder="pagina" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="estado" value="1"> Activo
                            </label>
                        </div>

                        <input type="submit" class="btn btn-primary" name="guardar" value="Guardar"/>

                    </form>
                    <br>
                </div>
            </div>
        </div>
        <!-- /Content Section -->
    </section> 
</section>            
