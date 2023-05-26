<?php
    if (isset($_POST['delete'])){
        $tid=$_POST['d'];
        $con=mysqli_connect("localhost","root","","atg");
        $query="delete from teacher where tid='$tid'";
        
        if(mysqli_query($con,$query)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Deleted Successfully");
                window.location.href="teacher.php";
            </script>
            <?php
        }
        $con->close();
    }
    else{

    }
?>