<?php
    if(isset($_POST['timetable'])){
        ?>
        <html><link rel="stylesheet" href="CSS/timetable.css">
    <?php
        $con=mysqli_connect("localhost","root","","atg");
        $cq="select name from course order by name asc";
        $clq="select * from classroom where type='Lecture Hall'";
        $lq="select * from classroom where type='Computer lab'";
        $q1=mysqli_query($con,$cq);
        $q2=mysqli_query($con,$clq);
        $q3=mysqli_query($con,$lq);
        $n="0";
    ?>
    <head>
    </head>
    <body>
        <div id="form">
            <h1 class="text" align="center">Enter Details</h1>
        <form action="timetabledetails.php" method="post">
            <table align="center">
                <tr>
                    <th class="label">No. of teaching days</th>
                    <th><input type="number" class="input" name="days" required></th>
                </tr>
                <tr><th class="label">Courses</th>
                    <td><?php
                        while($course=mysqli_fetch_array($q1)){
                            $n++;
                            $c="c";
                            $temp=$c.$n;
                            ?>
                                <input type="checkbox" class="check" value="<?php echo $course['name'];?>" name="<?php echo $temp;?>"><label class="course"><?php echo $course['name'];?></label><br>
                            <?php
                        }
                    ?><input type="number" name="n" hidden value="<?php echo $n;?>"></td>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" class="addbutton" name="submit"></th>
                </tr>
            </table>
        </form>
                    </div>
    </body>
</html> 
        <?php
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

