<!DOCTYPE html>
<?php include 'include/styles.php';?>
<?php //include 'include/menu.php';?>

<body cz-shortcut-listen="true">


    <?php include 'include/menu.php';?>


    <?php

        define("DB_PATH", "portfolio.db");
        include 'database.class.php';

        $database = new Database();
        $database->query('SELECT * FROM Over_mij LEFT JOIN user ON About_id = user.user_id');
        $database->execute();
        $results = $database->resultset();

    echo"<div class='container pt-5 ' >

              <div class='row pb-4' >
                  <div class='col-12 text-center' >
                      <h1 >Over mij</h1>    
                  </div>
            </div>";


        foreach($results as $row){
            
            echo "<div class='container  mb-5'>";
            echo "<div class='row'>";
            
        echo " <div class='col-lg-6'>
                    <h3>Wie ben ik</h3>
                    <p> {$row['Wie']}  </p>
                </div>";
          echo " <div class='col-lg-6'>
                    <h3>Opleiding</h3>
                    <p> {$row['Opleiding']} </p>
                </div>";
                  echo " <div class='col-lg-6'>
                    <h3>Ervaring</h3>
                    <p>{$row['Ervaring']} </p>
                </div>";
                
                  echo" <div class='col-lg-6'>
                  <h3></h3>
                        <img src='img/logo_print.png' alt='Stenden' class='img-responsive'>
                    </div> ";
            
            echo "</div>";
            echo "</div>";
           
        }
        ?>
 

 

                



        <?php include 'include/footer.php';?>

        <?php include 'include/scripts.php';?>
