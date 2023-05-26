<?php
    if(isset($_POST['submit'])){
        $tname=$_POST['tname'];
        $title=$_POST['title'];
        $tphone=$_POST['tphone'];
        $tmail=$_POST['tmail'];
        $tid=$_POST['tid'];
        $interest=serialize($_POST['interest']);
        $con=mysqli_connect("localhost","root","","atg");
        $query="insert into teacher (tid,title,tname,tphone,tmail,interest) values ('$tid','$title','$tname','$tphone','$tmail','$interest')";
        if(mysqli_query($con,$query)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Added Successfully");
                window.location.href="teacher.php";
            </script>
            <?php
        }
    }
    else{
        ?>
            <script>
                alert("Please Login First!");
                window.location.href="adminlogin.html";
            </script>
        <?php
    }
?>