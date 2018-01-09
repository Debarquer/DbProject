<?php

class Controller{
    function checkPage(){
        if(!isset($_GET["page"])){
            echo "No page set!<br>";
            return "home";
        }
        else{
            $page = $_GET["page"];
            //echo "Page set to $page <br>";
            switch($page){
                case "home":
                    return "home";
                case "nothome":
                    return "nothome";
                case "database":
                    return "database";
                case "form":
                        return "form";
                default:
                    return "home";
            }
        }
    }

    function checkPost(){
        if(isset($_POST["studentName"])){
            echo "Student name: ". $_POST["studentName"] . "<br>";

            DB::insertIntoStudent($_POST["studentName"]);
        }
        else if(isset($_POST["ustudentname"])){
            echo "Student name: ". $_POST["ustudentname"] . "<br>";

            DB::updateStudent($_POST["ustudentpk"], $_POST["ustudentname"]);
        }
        else if(isset($_POST["teacherName"])){
            echo "Teacher name: ". $_POST["teacherName"] . "<br>";

            DB::insertIntoTeacher($_POST["teacherName"]);
        }
        else if(isset($_POST["uteachername"])){
            echo "Techer name: ". $_POST["uteachername"] . "<br>";

            DB::updateTeacher($_POST["uteacherpk"], $_POST["uteachername"]);
        }
        else if(isset($_POST["courseName"])){
            echo "Course name: ". $_POST["courseName"] . "<br>";

            DB::insertIntoCourse($_POST["courseName"]);
        }
        else if(isset($_POST["ucoursename"])){
            echo "Course name: ". $_POST["ucoursename"] . "<br>";

            DB::updateCourse($_POST["ucoursepk"], $_POST["ucoursename"]);
        }
        else if(isset($_GET["delete"])){
            DB::deleteFromDb("teacher", $_GET["delete"]);
        }
    }
}

?>
