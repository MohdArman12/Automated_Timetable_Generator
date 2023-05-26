<?php
    if (isset($_POST['delete'])){
        $id=$_POST['d'];
        $con=mysqli_connect("localhost","root","","atg");
        $query="delete from classroom where id='$id'";
        
        if(mysqli_query($con,$query)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Deleted Successfully");
                window.location.href="classroom.php";
            </script>
            <?php
        }
        $con->close();
    }
    else{

    }
?>