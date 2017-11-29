<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>

<table>
        <tr>
            <th>Wie</th>
            <th>Opleiding</th>
            <th>Ervaring</th>
    
        </tr>
        <?php

        define("DB_PATH", "portfolio.db");
        include 'database.class.php';

        $database = new Database();
        $database->query('SELECT * FROM Over_mij LEFT JOIN user ON About_id = user.user_id');
        $database->execute();
        $results = $database->resultset();


        foreach($results as $row){
            echo "<tr>";
        
            echo "<td>" . $row['Wie'] . "</td>";
            echo "<td>" . $row['Opleiding'] . "</td>";
            echo "<td>" . $row['Ervaring'] . "</td>";
            echo "</tr>";
        }
        ?>
</table>
</html>