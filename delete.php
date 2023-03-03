<?php
$connection = mysqli_connect("localhost","root","","db_student");

$query = mysqli_query($connection,"select * from tbl_employee");

if(isset($_GET['did']))
{
    $delete_id = $_GET['did'];
    $deleteq = mysqli_query($connection,"delete from tbl_employee where emp_id='{$delete_id}'");

    if($delete_id)
    {
        echo "<script>alert('Record Deleted');</script>";
    }
}




echo "<table border='1' align='center'>";

echo "<tr>";

echo "<th>ID</th>";
echo "<th>FIRST NAME</th>";
echo "<th>LAST NAME</th>";
echo "<th>AGE</th>";
echo "<th>GENDER</th>";
echo "<th>MOBILE</th>";
echo "<th>EMAIL</th>";
echo "<th>IMAGE</th>";
echo "<th>CITY</th>";
echo "<th>HOBBIE</th>";
echo "<th>ACTION</th>";

echo "</tr>";

while($row = mysqli_fetch_array($query))
{
    echo "<tr>";

    echo "<td>{$row['emp_id']}</td>";
    echo "<td>{$row['emp_fname']}</td>";
    echo "<td>{$row['emp_lname']}</td>";
    echo "<td>{$row['emp_age']}</td>";
    echo "<td>{$row['emp_gender']}</td>";
    echo "<td>{$row['emp_mobile']}</td>";
    echo "<td>{$row['emp_email']}</td>";
    echo "<td><img style='width:130px;' src = '{$row['emp_image']}' ></td>";
    echo "<td>{$row['emp_city']}</td>";
    echo "<td>{$row['emp_hobbie']}</td>";

    echo "<td> <a href='edit.php?eid={$row['emp_id']}'>Edit</a> | <a href='delete.php?did={$row['emp_id']}'>Delete</a>  </td>";


    echo "</tr>";
}






echo "</table>";