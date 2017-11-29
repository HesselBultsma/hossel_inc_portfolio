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

    <?php 


   define("DB_PATH", "portfolio.db");
        include 'database.class.php';
	
	  $database = new Database();
        $database->query('SELECT * FROM contact LEFT JOIN user ON contact_id = user.user_id');
        $database->execute();
        $results = $database->resultset();
	
	print_r($results);
	        foreach($results as $row){

	echo "TEST: " .$row['email'];
	echo $row['telefoon'];
	echo $row['studentnummer'];
        ?>

              
              
               <div class="container  pb-4">
	       
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
		    <form action="" method="post">
                        <thead>
                        <tr>
                                <td><b>Email</b></td>
                                <td><?php echo $row['email'];?></td>

                            </tr>
                            <tr>
                                <td><b>Tel nr</b></td>
                                <td><?php echo $row['telefoon'];?></td>

                            </tr>
                            <tr>
                                <td><b>Student nr</b></td>
                                <td><?php  echo $row['studentnummer'];?></td>
<?php } ?>
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
