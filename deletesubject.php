<?php
    if(isset($_POST['delete'])){
        
        $sid=$_POST['d'];
        $con=mysqli_connect("localhost","root","","atg");
        $query="delete from subject where s_id='$sid'";
        
        if(mysqli_query($con,$query)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Deleted Successfully");
                window.location.href="subject.php";
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