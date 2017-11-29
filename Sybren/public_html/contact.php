<!DOCTYPE html>
<?php include 'include/styles.php';?>
<?php //include 'include/menu.php';?>

<body cz-shortcut-listen="true">


    <?php include 'include/menu.php';?>




    <section class="pb-5">
               <div class="container pt-5 pb-4">

            <div class="row ">
                <div class="col-12 text-center">
                    <h1>Contact
                </div>



            </div>
        </div>

<?php  include 'include/test.php';?>
    <?php 
    if(isset($_POST['submit'])){
$Postmail = ($_POST['Email']);
$Posttel = ($_POST['Tel']);
$Poststudent = ($_POST['Student']);
$email = "Test@live.com";
$tel = "06-1234567890";
$student = "128696";


$str_email = str_replace("Test@live.com", $Postmail, $email);
$email = $str_email;
$str_tel = str_replace("06-1234567890", $Posttel, $tel);
$tel = $str_tel;
$str_student = str_replace("128696", $Poststudent, $student);
$student = $str_student;
}

if(empty($email)) {
$email = "";
}
if(empty($tel)) {
$tel = "";
}
if(empty($student)) {
$student = "";
}


?>
              
              
               <div class="container  pb-4">
	       
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
		    <form action="" method="post">
                        <thead>
                        <tr>
                                <td><b>Email</b></td>
                                <td><?php echo $email?></td>

                            </tr>
                            <tr>
                                <td><b>Tel nr</b></td>
                                <td><?php echo $tel?></td>

                            </tr>
                            <tr>
                                <td><b>Student nr</b></td>
                                <td><?php  echo $student?></td>

                            </tr>
                           
                        </tbody>
                    </table>
		    </form>
                </div>
                <div class="col-md-6">
                    <img src="http://placehold.it/300x300" alt="Stenden" class="img-responsive">
                </div>
            </div>
        </div>




    </section>



    <?php include 'include/footer.php';?>

    <?php include 'include/scripts.php';?>
