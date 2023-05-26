<?php
    if(isset($_POST['submit'])){
        $room=$_POST['room'];
        $dept=$_POST['dept'];
        $floor=$_POST['floor'];
        $type=$_POST['type'];
        $con=mysqli_connect("localhost","root","","atg");
        $query="insert into classroom (room,dept,floor,type) values ('$room','$dept','$floor','$type')";
        
        if(mysqli_query($con,$query)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Added Successfully");
                window.location.href="classroom.php";
            </script>
            <?php
        }
        $con->close();
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