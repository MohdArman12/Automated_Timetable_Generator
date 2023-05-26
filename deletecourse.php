<?php
    if (isset($_POST['delete'])){
        $cname=$_POST['d'];
        $con=mysqli_connect("localhost","root","","atg");
        $con1=mysqli_connect("localhost","root","","timetable");
        $query="delete from course where name='$cname'";
        $query1="delete from timetabledetail where name='$cname'";
        mysqli_query($con1,$query1);
        mysqli_query($con,$query);
        $q="drop table $cname";
        mysqli_query($con1,$q);
        if(mysqli_query($con,$q)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Deleted Successfully");
                window.location.href="course.php";
            </script>
            <?php
        }
        $con->close();
    }
    else{

    }
?>