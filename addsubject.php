<?php
    if(isset($_POST['submit'])){
        $sub_name=$_POST['sub_name'];
        $category=$_POST['category'];
        $con=mysqli_connect("localhost","root","","atg");
        $query="insert into subject (sub_name,category) values ('$sub_name','$category')";
        
        if(mysqli_query($con,$query)){
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Added Successfully");
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