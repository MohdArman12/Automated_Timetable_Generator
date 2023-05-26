<?php
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $room=$_POST['room'];
        $dept=$_POST['dept'];
        $floor=$_POST['floor'];
        $type=$_POST['type'];
        $con=mysqli_connect("localhost","root","","atg");
        $query="update classroom set room='$room', dept='$dept', floor='$floor', type='$type' where id='$id'";
        
        if(mysqli_query($con,$query)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Updated Successfully");
                window.location.href="classroom.php";
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