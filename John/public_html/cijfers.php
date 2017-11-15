<!DOCTYPE html>
<?php include 'include/styles.php';?>
<?php //include 'include/menu.php';?>

<body cz-shortcut-listen="true">


    <?php include 'include/menu.php';?>




    <section>
        <div class="container pt-5 pb-4">

            <div class="row ">
                <div class="col-12 text-center">
                    <h1>Cijfers
                </div>



            </div>
        </div>

        <div class="container  pb-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Vak</th>
                                <th>Cijfer</th>
                            </tr>
                        </thead>
                        <tbody>
                           
		<?php
		
		$HTML = 7;
		$CSS = 9;
		$Javascript = 8;
		$PHP = 6;
		$Rails = 9;
		$Jquery = 8;
		$Gemiddelde = ($HTML + $CSS + $Javascript + $PHP + $Rails + $Jquery) / 6;
		$afgerond = round($Gemiddelde);
			echo " <tr>
                                <td>HTML</td>
                                <td>$HTML</td>

                            </tr>
                            <tr>
                                <td>CSS</td>
                                <td>$CSS</td>

                            </tr>
                            <tr>
                                <td>Javascript</td>
                                <td>$Javascript</td>

                            </tr>
                            <tr>
                                <td>PHP</td>
                                <td>$PHP</td>

                            </tr>
                            <tr>
                                <td>Rails</td>
                                <td>$Rails</td>

                            </tr>
                            <tr>
                                <td>Jquery</td>
                                <td>$Jquery</td>

                            </tr>
			     <tr>
                                <td><b>Gemiddelde</b></td>
                                <td><b> $afgerond </b></td>

                            </tr>"
			    ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>




    <?php include 'include/footer.php';?>

    <?php include 'include/scripts.php';?>
