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
            <th>Cijfer id</th>
            <th>Resultaat</th>
            <th>Vak</th>
            <th>Student id</th>
            <th>Student naam</th>
        </tr>
        <?php

        define("DB_PATH", "portfolio.db");
        include 'database.class.php';

        $database = new Database();
        $database->query('SELECT * FROM cijfers LEFT JOIN user ON cijfers.student_id = user.user_id');
        $database->execute();
        $results = $database->resultset();


        foreach($results as $row){
            echo "<tr>";
            echo "<td>" . $row['cijfers_id'] . "</td>";
            echo "<td>" . $row['cijfer'] . "</td>";
            echo "<td>" . $row['cijfer_vak'] . "</td>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "<td>" . $row['firstname'] .  " " . $row["lastname"] . "</td>";
            echo "</tr>";
        }
        ?>
</table>
</html>