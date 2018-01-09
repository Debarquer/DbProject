<?php

class DB{
    static public $conn = null;

    static public function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        DB::$conn = new mysqli($servername, $username, $password);

        // Check connection
        if (mysqli_connect_error()) {
            die("Database connection failed: " . mysqli_connect_error());
        }else{
            //echo "Successfully connected to database<br>";
        }
    }

    static public function printFromDb($table){
        $sql = "SELECT pk, name FROM school.$table";
        $result = DB::$conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            echo "0 results";
        }
    }

    static public function deleteFromDb($table, $pk){
        $sql = "DELETE FROM school.$table WHERE pk  =$pk";

        if (DB::$conn->query($sql) === TRUE) {
            echo "Record deleted successfully<br>";
        } else {
            echo "Error deleting record: " . DB::$conn->error . "<br>";
        }
    }

    static public function insertIntoStudent($name){
        echo "Attempting to add student...<br>";

        $sql = "INSERT INTO school.student (name) VALUES ('$name')";
        //$result = DB::$conn->query($sql);

        if (DB::$conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . DB::$conn->error . "<br>";
        }
    }

    static public function updateStudent($pk, $name){
        $sql = "UPDATE school.student SET name='$name' WHERE pk=$pk";

        if (DB::$conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . DB::$conn->error;
        }
    }

    static public function insertIntoTeacher($name){
        echo "Attempting to add student...<br>";

        $sql = "INSERT INTO school.teacher (name) VALUES ('$name')";
        //$result = DB::$conn->query($sql);

        if (DB::$conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . DB::$conn->error . "<br>";
        }
    }

    static public function updateTeacher($pk, $name){
        $sql = "UPDATE school.teacher SET name='$name' WHERE pk=$pk";

        if (DB::$conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . DB::$conn->error;
        }
    }

    static public function insertIntoCourse($name){
        echo "Attempting to add student...<br>";

        $sql = "INSERT INTO school.course (name) VALUES ('$name')";
        //$result = DB::$conn->query($sql);

        if (DB::$conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . DB::$conn->error . "<br>";
        }
    }

    static public function updateCourse($pk, $name){
        $sql = "UPDATE school.course SET name='$name' WHERE pk=$pk";

        if (DB::$conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . DB::$conn->error;
        }
    }
}
 ?>
