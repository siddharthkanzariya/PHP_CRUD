<?php
$connection = mysqli_connect("localhost","root","","db_student");


$edit_id = $_GET['eid'];
$editq = mysqli_query($connection,"select * from tbl_employee where emp_id='{$edit_id}'");
$edit_data = mysqli_fetch_array($editq);

if($_POST)
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $img = "upload/".$_FILES['file']['name'];
    $city = $_POST['city'];
    $hobbie = implode(",",$_POST['cbox']);


    $updateq = mysqli_query($connection,"update tbl_employee set emp_fname='{$fname}',emp_lname='{$lname}',emp_age='{$age}',emp_gender='{$gender}',emp_mobile='{$mobile}',emp_email='{$email}',emp_image='{$img}',emp_city='{$city}',emp_hobbie='{$hobbie}' where emp_id='{$_GET['eid']}'");
    if($updateq)
    {
        $file = move_uploaded_file($_FILES['img']['tmp_name'],$img);
        echo "<script>alert('Record Updated.');window.location='delete.php';</script>";
    }
}


?>
<html>
    <body>
        <form method="post" enctype="multipart/form-data">
            <table border="1">
                <tr>
                    <td>FName</td>
                    <td>  <input type="text" name="fname" value="<?php  echo $edit_data['emp_fname']  ?>" /> </td>
                    
                </tr>
                <tr>
                    <td>LName</td>
                    <td>  <input type="text" name="lname" value="<?php  echo $edit_data['emp_lname']  ?>" /> </td>
                    
                </tr>
                <tr>
                    <td>Age</td>
                    <td>  <input type="text" name="age" value="<?php  echo $edit_data['emp_age']  ?>" /> </td>
                     
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>  <input type="text" name="gender" value="<?php  echo $edit_data['emp_gender']  ?>" /> </td>
                     
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>  <input type="text" name="mobile" value="<?php  echo $edit_data['emp_mobile']  ?>" /> </td>
                     
                </tr>
                <tr>
                    <td>Email</td>
                    <td>  <input type="text" name="email" value="<?php  echo $edit_data['emp_email']  ?>" /> </td>
                     
                </tr>
                <tr>
                    <td>Image</td>
                    <td>  <input type="file" name="file" value="<?php  echo $edit_data['emp_image'] ?>" /> </td>
                    
                </tr>
                <tr>
                    <td>City</td>
                    <td>  <select name="city" value="<?php echo $edit_data['emp_city'] ?>">
            <option>Aarey</option>
            <option>Dharavi</option>
            <option>Navi Mumbai</option>
            <option>South Bombey</option>
            <option>West Bombey</option>
        </select>
                     
                </tr>
                    <td>Hobbie</td>
                    <td> 
                        Hockey<input type="checkbox" name="cbox[]" value="<?php echo $edit_data['emp_hobbie'] ?>"/>
                         Football<input type="checkbox" name="cbox[]" value="<?php echo $edit_data['emp_hobbie'] ?>"/>
                         Cricket<input type="checkbox" name="cbox[]" value="<?php echo $edit_data['emp_hobbie'] ?>"/> 
                         Ludo<input type="checkbox" name="cbox[]" value="<?php echo $edit_data['emp_hobbie'] ?>"/>
                    </td>
                        
                </tr>
                <tr>
                    <td><input type="submit"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>