<?php
    if(isset($_POST['update'])){
        $tid=$_POST['tid'];
        $title=$_POST['title'];
        $tname=$_POST['tname'];
        $tphone=$_POST['tphone'];
        $tmail=$_POST['tmail'];
        $interest=serialize($_POST['interest']);
        $con=mysqli_connect("localhost","root","","atg");
        $query="update teacher set title='$title', tname='$tname', tphone='$tphone', tmail='$tmail', interest='$interest' where tid='$tid'";
        
        if(mysqli_query($con,$query)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Updated Successfully");
                window.location.href="teacher.php";
            </script>
            <?php
        }
        $con->close();
    }
    else{
        ?>
        <script>
            alert("Please login first!");
            window.location.href="adminlogin.html";
        </script>
        <?php
    }
?>