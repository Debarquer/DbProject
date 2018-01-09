<?php

require_once("db.php");

//echo "Here you can read database stuff and things<br>";

$table = "not_set";
if(!isset($_GET["table"])){
    //$_SESSION["table"] = $table = "student";
}
else{
    $_SESSION["table"] = $table = $_GET["table"];
}

echo "
    <form action='main.php?page=database' id='tableForm' method='post'>
        <div class='form-group'>
            <a href='?page=database&table=student' class='btn btn-primary'>Student</a>
            <a href='?page=database&table=teacher' class='btn btn-primary'>Teacher</a>
            <a href='?page=database&table=course' class='btn btn-primary'>Course</a>";

            /*echo "<select name='table' form='tableForm'>
                <label for='studentNameField'>Table name</label>";
                if(isset($_SESSION["table"]) && $_SESSION["table"] == "student"){
                    echo "<option value='student' selected name='table'>Student</option>";
                }
                else{
                    echo "<option value='student' name='table'>Student</option>";
                }
                if(isset($_SESSION["table"]) && $_SESSION["table"] == "teacher"){
                    echo "<option value='teacher' selected name='table'>Teacher</option>";
                }
                else{
                    echo "<option value='teacher' name='table'>Teacher</option>";
                }
                if(isset($_SESSION["table"]) && $_SESSION["table"] == "course"){
                    echo "<option value='course' selected name='table'>Course</option>";
                }
                else{
                    echo "<option value='course' name='table'>Course</option>";
                }
            echo "
            </select>
        </div>
        <button type='submit' class='btn btn-default'>Change table</button>";*/
    echo "</form>
";

if($_SESSION["table"] == "student"){
    $header = "<table class='table'><tr><th>pk</th><th>Student name</th><th>Student email</th><th>delete</th><th>update</th></tr>";
    outputDB($header);
}else if($_SESSION["table"] == "teacher"){
    $header = "<table class='table'><tr><th>pk</th><th>Teacher name</th><th>delete</th><th>update</th></tr>";
    outputDB($header);
}else if($_SESSION["table"] == "course"){
    $header = "<table class='table'><tr><th>pk</th><th>Course name</th><th>delete</th><th>update</th></tr>";
    outputDB($header);
}else{
    echo "Table ". $_SESSION["table"] ."not implemented.<br>";
}

function outputDB($rowHeader){
    $result = DB::printFromDb($_SESSION["table"]);

    // output data of each row
    $id = 0;
    $updateThis = false;
    echo $rowHeader;
    while($row = $result->fetch_assoc()) {
        //If $_GET["update"] is set and equals the current row then print out the update form
        if(isset($_GET["update"])){
            if($_GET["update"] == $row["pk"]){
                $updateThis = true;
                echo "
                <form action='main.php?page=database' method='post'>
                    <div class='form-group'>";
                        echo "<tr>";
                        echo "<td class='info'>" . $row["pk"]. "</td>";
                        echo "<td class='info'>";
                        //echo "<label for='studentNameField'>Student name</label>";
                        echo "<input type='text' class='form-control' id='u" . $_SESSION["table"] . "namefield' name='u" . $_SESSION["table"]."name' placeholder='".$row['name'] . "'></td>";
                        if($_SESSION['table'] == "student"){
                            echo "<td class='info'>";
                            echo "<input type='text' class='form-control' id='u" . $_SESSION["table"] . "namefield' name='u" . $_SESSION["table"]."email' placeholder='".$row['email'] . "'></td>";
                        }
                        echo "<td class='danger'><a href=?page=database&delete=" . $row["pk"] . " class='btn btn-danger'>Delete</a></td>";
                        echo "<td class='info'><button type='submit' class='btn btn-default' name='u" . $_SESSION["table"] . "pk' value=" .$row["pk"] . ">Confirm update</button>";
                        echo "<a href=?page=database&table=".$_SESSION["table"]." class='btn btn-default'>Cancel</a>";
                        echo "</td>";
                        echo "</tr>";
                    echo "
                    </div>
                </form>
                ";
            }
            else{
                //a row is being updated but not this row
                $updateThis = false;
            }
        }
        else{
            //no rows are being updated
            $updateThis = false;
        }

        //this row is not being updated, print out the row without the update form
        if(!$updateThis){
            echo "<tr>";
            echo "<td class='info'>" . $row["pk"]. "</td>";
            echo "<td class='info'>" . $row["name"]. "</td>";
            if($_SESSION['table'] == "student"){
                echo "<td class='info'>" . $row["email"]. "</td>";
            }
            echo "<td class='danger'><a href=?page=database&delete=" . $row["pk"] . "&table=".$_SESSION["table"]." class='btn btn-danger'>Delete</a></td>";
            echo "<td class='info'><a href=?page=database&update=" . $row["pk"] . "&table=".$_SESSION["table"]." class='btn btn-default'>Update</a></td>";
            echo "</tr>";
        }

        $id++;
    }
    echo "</table>";
}


?>
