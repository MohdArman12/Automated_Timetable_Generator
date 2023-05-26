<?php
    if(isset($_POST['update'])){
        $s_id=$_POST['id'];
        $category=$_POST['category'];
        $con=mysqli_connect("localhost","root","","atg");
        $query="update sub_category set category='$category' where id='$s_id'";
        
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