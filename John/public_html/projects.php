<!DOCTYPE html>
<?php include 'include/styles.php';?>
<?php //include 'include/menu.php';?>

<body cz-shortcut-listen="true">


    <?php include 'include/menu.php';?>





        <div class="container pt-5 " >

              <div class="row pb-4" >
                  <div class="col-12 text-center" >
                      <h1 >Projecten</h1>    
                  </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                </div>
                <div class="col-12 ">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                </div>

            </div>
           

        </div>
   
    
    
    
     <?php

        define("DB_PATH", "portfolio.db");
        include 'database.class.php';

        $database = new Database();
        $database->query('SELECT * FROM project LEFT JOIN user ON project_id = user.user_id');
        $database->execute();
        $results = $database->resultset();

    
         echo "<div class='container mt-4 mb-5'>";
            echo "<div class='row'>";

        foreach($results as $row){
            
   
            
        echo "     <div class='col-lg-6 portfolio-item '>
          <div class='card h-100 wow slideInUp  ' >
            <a href='#'><img class='card-img-top' src='http://placehold.it/700x400' alt=''></a>
            <div class='card-body'>
              <h4 class='card-title'>
                <a href='#'>{$row['title']}</a>
              </h4>
             <p class='short-description'>{$row['short_description']}</p>
            </div>
          </div>
        </div> ";
        
         
            
          
           
        }
    
      echo "</div>";
            echo "</div>";
        ?>
    
    
    
   

   
    
    
   




    <?php include 'include/footer.php';?>

    <?php include 'include/scripts.php';?>
