<?php
    $con=mysqli_connect("localhost","root","","atg");
    $query="select ttname from ttname where id='1'";
    $result=mysqli_query($con,$query);
    $data=mysqli_fetch_array($result);
    $ttname=$data['ttname'];
    $image=$_POST["image"]; 
    $image=explode(";", $image)[1];
    $image=explode(",", $image)[1];
    $image=str_replace(" ","+", $image);
    $image=base64_decode($image);
    file_put_contents("C:/xampp/htdocs/ATG/Timetable/$ttname", $image);
?>