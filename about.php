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
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <?
                      $result=query("SELECT * FROM about");
                      while($row = fetch_array($result)) {
                    echo '<h2 class="intro-text text-center">'.$row['titulo_p'].'</h2>' ;}?>
                    <hr>
                </div>

                <div class="col-md-6">
                  <?
                      $result=query("SELECT * FROM about");
                      while($row = fetch_array($result)) {
                    echo '<img class="img-responsive img-border-left" src="admin/imagenes_about/'.$row['img'].'" alt="">'
                  ;}?>
                </div>
                <div class="col-md-6">
                  <?
                      $result=query("SELECT * FROM about");
                      while($row = fetch_array($result)) {
                      echo '<p>'.$row['contenido_p'].'</p>';
                   }?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <? include('footer.php'); ?>
    <? include('scripts.php'); ?>
</body>

</html>



