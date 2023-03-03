<?php
$connection = mysqli_connect("localhost","root","","db_student");

if($_POST)
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $img = "upload/".$_FILES['img']['name'];
    $city = $_POST['city'];
    $hobbie = implode(",",$_POST['cbox']);

    $insert_q = mysqli_query($connection,"insert into tbl_employee(emp_fname,emp_lname,emp_age,emp_gender,emp_mobile,emp_email,emp_image,emp_city,emp_hobbie) values('{$fname}','{$lname}','{$age}','{$gender}','{$mobile}','{$email}','{$img}','{$city}','{$hobbie}')");

    if($insert_q)
    {
        $file = move_uploaded_file($_FILES['img']['tmp_name'],$img);
        if($file)
        {
            echo "<script>alert('Record Inserted');</script>";

        }
    }
}

?>
<html>
    <head>
        <h1>EMPLOYEE INFORMATION</h1>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
        First Name : <input type="text" name="fname"/>
        <br/><br/>
        Last Name : <input type="text" name="lname"/>
        <br/><br/>
        Age : <input type="text" name="age"/>
        <br/><br/>
        Gender : <input type="radio" name="gender" value="Male"/>Male 
                 <input type="radio" name="gender" value="Female"/>Female 
        <br/><br/>
        Mobile : <input type="text" name="mobile"/>
        <br/><br/>
        Email : <input type="email" name="email"/>
        <br/><br/>
        Image : <input type="file" name="img"/>
        <br/><br/>
        City : <select name="city">
            <option>Aarey</option>
            <option>Dharavi</option>
            <option>Navi Mumbai</option>
            <option>South Bombey</option>
            <option>West Bombey</option>
        </select>
        <br/><br/>
        <br/><br/>
        Hobbie : Cricket<input type="checkbox" name="cbox[]" value="cricket"/>
                 Football<input type="checkbox" name="cbox[]" value="football"/>
                 Hockey<input type="checkbox" name="cbox[]" value="football"/>
                 Ludo<input type="checkbox" name="cbox[]" value="ludo"/>
                 <br/><br/>
        <input type="submit"/>

        
        </form>
    </body>
</html>