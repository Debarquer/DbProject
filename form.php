<?php

echo "
    <form action='main.php?page=form' id='formForm' method='post'>
        <div class='form-group'>
            <select name='form' form='formForm'>
                <label for='studentNameField'>Table name</label>";
                if(isset($_POST["form"]) && $_POST["form"] == "student"){
                    echo "<option value='student' selected name='table'>Student</option>";
                }
                else{
                    echo "<option value='student' name='table'>Student</option>";
                }
                if(isset($_POST["form"]) && $_POST["form"] == "teacher"){
                    echo "<option value='teacher' selected name='table'>Teacher</option>";
                }
                else{
                    echo "<option value='teacher' name='table'>Teacher</option>";
                }
                if(isset($_POST["form"]) && $_POST["form"] == "course"){
                    echo "<option value='course' selected name='table'>Course</option>";
                }
                else{
                    echo "<option value='course' name='table'>Course</option>";
                }
            echo "
            </select>
        </div>
        <button type='submit' class='btn btn-default'>Change form</button>
    </form>
";

$form = "not_set";
if(!isset($_POST["form"])){
    $form = "student";
}
else{
    $form = $_POST["form"];
}

switch($form){
    case "student":
        studentForm();
        break;
    case "teacher":
        teacherForm();
        break;
    case "course":
        courseForm();
        break;
    default:
        studentForm();
        break;
}

function studentForm(){
    echo "
    <form action='main.php?page=form' method='post'>
        <div class='form-group'>
            <label for='studentNameField'>Student name</label>
            <input type='text' class='form-control' id='studentNameField' name='studentName' placeholder='Student name'>
            <input type='text' class='form-control' id='studentEmailField' name='studentEmail' placeholder='Student email'>
            <p class='help-block'>Insert thing A here.</p>
        </div>
        <button type='submit' class='btn btn-default'>Add new student</button>
    </form>
    ";
}

function teacherForm(){
    echo "
    <form action='main.php?page=form' method='post'>
        <div class='form-group'>
            <label for='teacherNameField'>Teacher name</label>
            <input type='text' class='form-control' id='teacherNameField' name='teacherName' placeholder='Teacher name'>
            <p class='help-block'>Insert thing A here.</p>
        </div>
        <button type='submit' class='btn btn-default'>Add new teacher</button>
    </form>
    ";
}

function courseForm(){
    echo "
    <form action='main.php?page=form' method='post'>
        <div class='form-group'>
            <label for='courseNameField'>Course name</label>
            <input type='text' class='form-control' id='courseNameField' name='courseName' placeholder='Course name'>
            <p class='help-block'>Insert thing A here.</p>
        </div>
        <button type='submit' class='btn btn-default'>Add new course</button>
    </form>
    ";
}

 ?>
