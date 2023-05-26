<?php
    if(isset($_POST['submit'])){
        $n=$_POST['n'];
        $days=$_POST['days'];
        $i=0;
        $a=0;
        $index=0;
        $coursename=[];
        //assigning checkbox value to array
        
        $courses=[];
        while($i<$n){
            $c="c";
            $a++;
            $temp=$c.$a;
            $coursename[$i]=$temp;
            if(isset($_POST[$temp])){
                $courses[$index]=$_POST[$temp];
                $index++;
                
            }
            
            $i++;

        }

        //database connection
        $con=mysqli_connect("localhost","root","","atg");
        $classquery="select * from classroom where type='Lecture hall' order by dept asc";
        $labquery="select * from classroom where type='Computer lab' order by dept asc";

        //creating table for taking data for different courses
        ?>
        <link href="CSS/timetabledetail.css" rel="stylesheet">
        <body bgcolor="#FEFCF3">
        <form action="createtimetable.php" method="post">
            <input type="text" hidden value="<?php echo $index;?>" name="index">
            <input type="text" hidden value="<?php echo $days;?>" name="days">

        <?php
        for($i=0;$i<$index;$i++){
            //for no. of lectures
            $lecture="lect";
            $lect=$lecture.($i+1);
            //for lab timing
            $lab="lab";
            $labs=$lab.($i+1)."s";
            $labe=$lab.($i+1)."e";
            //class starting
            $class="cl";
            $ct=$class.($i+1);
            //class duration
            $duration="cd";
            $cd=$duration.($i+1);
            
            //lunch timing
            $lunch="lunch";
            $lunchs=$lunch.($i+1)."s";
            $lunche=$lunch.($i+1)."e";
            //class allotments
            $classallot="callot";
            $callot=$classallot.($i+1);
            //lab allotments
            $laballot="lallot";
            $lallot=$laballot.($i+1);
            
            //sql queries
            $cresult=mysqli_query($con,$classquery);
            $lresult=mysqli_query($con,$labquery);
            ?>
            <table align="center">

                
                <tr>
                    <th colspan="2"><h3 align="center" class="text">Enter Details for <?php echo $courses[$i];?></h3></th>
                </tr>
                <tr><th colspan="2"><input type="text" hidden value="<?php echo $courses[$i];?>" name="<?php echo $coursename[$i];?>">
</th></tr>
                <tr>
                    <th class="label">No. of lectures</th>
                    <th><input type="number" name="<?php echo $lect;?>" class="input" required></th>
                </tr>
                <tr>
                    <th class="label">Lab Timing</th>
                    <th>from <input type="time" class="input" value="14:00" name="<?php echo $labs;?>" required> to <input class="input" value="17:00" type="time" name="<?php echo $labe;?>" required></th>
                </tr>
                <tr>
                    <th class="label">Classes starts from</th>
                    <th><input type="time" class="input" value="09:10" name="<?php echo $ct;?>" required></th>
                </tr>
                <tr>
                    <th class="label">Duration of Class</th>
                    <th><input type="number" class="input" value="50" name="<?php echo $cd;?>" required>(in minutes)</th>
                </tr>
                
                <tr>
                    <th class="label">Recess</th>
                    <th>from <input type="time" class="input" name="<?php echo $lunchs;?>" required> to <input class="input" value="14:00" type="time" name="<?php echo $lunche;?>" required></th>
                </tr>
                <tr>
                    <th class="label">Allot Classroom</th>
                    <th><select name="<?php echo $callot;?>" class="input"><?php
                    while($crow=mysqli_fetch_array($cresult)){
                        ?>
                        <option value="<?php echo $crow['id'];?>"><?php echo $crow['room'];?>-<?php echo $crow['dept'];?></option>
                        <?php
                    }
                    ?></select></th>
                </tr>
                <tr>
                    <th class="label">Allot Lab</th>
                    <th><select name="<?php echo $lallot;?>" class="input"><?php
                    while($lrow=mysqli_fetch_array($lresult)){
                        ?>
                        <option value="<?php echo $lrow['id'];?>"><?php echo $lrow['room'];?>-<?php echo $lrow['dept'];?></option>
                        <?php
                    }
                    ?></select></th>
                </tr>
            </table><br><br><br>
            <?php
        }
        ?>
        <table align="center">
            <tr><th><input type="submit" class="addbutton" name="submit"></th></tr>
        </table>
        </form>
    </body>
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