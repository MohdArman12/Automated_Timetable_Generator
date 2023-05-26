<?php
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $con=mysqli_connect("localhost","root","","atg");
    $query="select * from admin where userid='administrator'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)){
        $row=mysqli_fetch_array($result);
        if($user==$row['userid'] && $pass==$row['password']){
            $x=1;
            $q="update temp set value='$x' where id='$x'";
            mysqli_query($con,$q);
            ?>
                <script>
                    alert("Login Success"); 
                    window.location.href="adminmodule.php";
                </script>
            <?php
        }
        else{
            ?>
            <script>
                    alert("Invalid User ID or Password!");
                    window.location.href="adminlogin.html";
                </script>
            <?php
        }
    }
    $con->close();
?>