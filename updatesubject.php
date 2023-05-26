<?php
    if(isset($_POST['update'])){
        $s_id=$_POST['s_id'];
        $sname=$_POST['sname'];
        $category=$_POST['category'];
        $con=mysqli_connect("localhost","root","","atg");
        $query="update subject set sub_name='$sname', category='$category' where s_id='$s_id'";
        
        if(mysqli_query($con,$query)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Updated Successfully");
                window.location.href="subject.php";
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