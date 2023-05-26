<?php
    if(isset($_POST['submit'])){
        $category=$_POST['category'];
        $con=mysqli_connect("localhost","root","","atg");
        $query="insert into sub_category (category) values ('$category')";
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