<!DOCTYPE html>
<?php include 'include/styles.php';?>
<?php //include 'include/menu.php';?>

<body cz-shortcut-listen="true">


    <?php include 'include/menu.php';?>




    <section>
        <div class="container pt-5 pb-5" >

              <div class="row pb-4" >
                  <div class="col-12 text-center" >
                      <h1 >Over mij</h1>    
                  </div>
            </div>

<?php  include 'include/test2.php';?>
    <?php 
    if(isset($_POST['submit'])){
$Postwbi = ($_POST['wbi']);
$Postervaring = ($_POST['ervaring']);
$Postopleiding = ($_POST['opleiding']);
$wbi = "Over mij";
$ervaring = "Mijn ervaring";
$opleiding = "ICT";


$str_wbi = str_replace("Over mij", $Postwbi, $wbi);
$wbi = $str_wbi;
$str_ervaring = str_replace("Mijn ervaring", $Postervaring, $ervaring);
$ervaring = $str_ervaring;
$str_opleiding = str_replace("ICT", $Postopleiding, $opleiding);
$opleiding = $str_opleiding;
}

if(empty($wbi)) {
$wbi = "";
}
if(empty($ervaring)) {
$ervaring = "";
}
if(empty($opleiding)) {
$opleiding = "";
}


?>
            <div class="row pb-4">
                <div class="col-lg-6">
                    <h3>Wie ben ik</h3>
                    <p><?php echo $wbi?></p>
                </div>
                <div class="col-lg-6 ">
                    <h3>Opleiding</h3>
                    <p><?php echo $opleiding?></p>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6 ">
                    <h3>Ervaring</h3>
                    <p><?php echo $ervaring?></p>
                </div>
                <div class="col-lg-6 ">
                    <img src="img/logo_print.png" alt="Stenden" class="img-responsive">
                </div>

            </div>

        </div>
    </section>



    <?php include 'include/footer.php';?>

    <?php include 'include/scripts.php';?>
