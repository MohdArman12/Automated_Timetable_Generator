<?php
    if(isset($_POST['submit'])){
        $con=mysqli_connect("localhost","root","","atg");
        $course=$_POST['course'];
        $theory=$_POST['theory'];
        $practical=$_POST['practical'];
        $tt="pt";
        $prt="prt";
        $sid="p";
        $pid="pr";
        for($i=0;$i<$theory;$i++){
            $ttn=$tt.$i;
            $sub_id=$sid.($i+1);
            $teacher=$_POST[$ttn];
            $query="update $course set teacher='$teacher' where sub_id='$sub_id'";
            mysqli_query($con,$query);
        }

        for($i=0;$i<$practical;$i++){
            $prtn=$prt.$i;
            $pr_id=$pid.($i+1);
            $teacher=$_POST[$prtn];
            $query="update $course set teacher='$teacher' where sub_id='$pr_id'";
            mysqli_query($con,$query);
        }
        
        
        
        
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <script>
                alert("Updated Successfully");
                window.location.href="course.php";
            </script>
            <?php
        
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