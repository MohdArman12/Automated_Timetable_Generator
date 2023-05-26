<html>
    <head>
    <script src="html2canvas.js"></script>
    <script>
       function doCapture(){
        window.scrollTo(0, 0);
        html2canvas(document.getElementById("photo")).then(function(canvas){
            var ajax = new XMLHttpRequest();
            ajax.open("POST", "saveImage.php", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send("image=" + canvas.toDataURL("image/jpeg",0.9));
            ajax.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };

        });
        alert("Successfully saved at C:\\xampp\\htdocs\\ATG\\Timetable");
       }

    </script>
</head>
    <body>
<form action="studentlogin.php">
    <input type="submit" value="Back" class="backbutton" style="margin:5px 5px; border-radius:20px; height:35px; width:80px;">
</form>
<div id="photo" >
<?php
    if(isset($_POST['submit'])){
        $course=$_POST['course'];
        $con=mysqli_connect("localhost","root","","timetable");

        $query="select * from timetabledetail where id='$course'";
        $r=mysqli_query($con,$query);
        $result=mysqli_fetch_array($r);
        $row=$result['row'];
        $col=$result['col'];
        $tid=[];
        $a=0;
        $name=$result['name'];
        echo "<h2 align=\"center\"> Timetable for ".$name."</h2>";
        $tt="select * from $name";
        $result=mysqli_query($con,$tt);
        $days=array("Day/Time","Mon","Tue","Wed","Thu","Fri","Sat");

        $con1=mysqli_connect("localhost","root","","atg");
        $query1="select * from $name";
        $r1=mysqli_query($con1,$query1);
        $ttname=$name."(timetable).jpeg";
        $tt_query="update ttname set ttname='$ttname' where id='1'";
        mysqli_query($con1,$tt_query);
        ?>
        <link rel="stylesheet" href="CSS/studenttimetable.css">

        <!--starting-->
        
    
        
        <table align="center" id="timetable">
        <?php
        $i=0;
        while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
            <?php
            for($j=0;$j<=$col;$j++){
                $c="col";
                $index=$c.$j;
                if($j==0){
                    ?>
                    <th class="day"><?php echo $days[$i];?></th>
                    <?php
                    $i++;
                }
                elseif ($i==1 && $j>0) {
                    $time=explode("-",$row[$index]);
                    $time1=explode(":",$time[0]);
                    $time2=explode(":",$time[1]);
                    if($time1[0]>=12){
                        if($time1[0]>12){
                            $time1[0]-=12;
                        }
                        $time1[1]=$time1[1]."PM";
                    }
                    else{
                        $time1[1]=$time1[1]."AM";
                    }
                    if($time2[0]>=12){
                        if($time2[0]>12){
                            $time2[0]-=12;
                        }
                        $time2[1]=$time2[1]."PM";
                    }
                    else{
                        $time2[1]=$time2[1]."AM";
                    }
                    $newtime=$time1[0].":".$time1[1]."-".$time2[0].":".$time2[1];
                    ?>
                    <th class="class"><?php echo $newtime;?></th>
                    <?php
                }
                else{
                    ?>
                    <th class="class"><?php echo $row[$index];?></th>
                    <?php
                }

            }
            ?>
            </tr>
            <?php
        }
        ?>
        </table>
        <!--Subjects-->
        <center>
        <table class="detail" width="65%" align="center" style="margin-top:30px;">
            <tr><th colspan="5" class="header">Details of Subjects and Teachers</th></tr>
            <tr><th class="header2">Subject Code</th><th class="header2">Subject Name</th><th class="header2">Subject Type</th><th class="header2">Teacher ID</th><th class="header2">Teacher's Name</th></tr>
            <?php
            while($row1=mysqli_fetch_array($r1)){
                $tid[$a]=$row1['teacher'];
                $tn="select * from teacher where tid='$tid[$a]'";
                $q=mysqli_query($con1,$tn);
                $r=mysqli_fetch_array($q);
                $a++;
                ?>
                <tr>
                <td style="padding-left:35px;"><?php echo $row1['sub_id'];?></td>
                <td style="padding-left:10px;"><?php echo $row1['sub_name'];?></td>
                <td style="padding-left:10px;"><?php echo $row1['type'];?></td>
                <td style="padding-left:10px;"><?php echo $row1['teacher'];?></td>
                <td style="padding-left:10px;"><?php echo $r['title'].". ".$r['tname'];?></td>
            </tr>
                <?php
            }
            ?>
        </table>
        
        <?php
        //getting class and lab id
        $query3="select * from course where name='$name'";
        $result3=mysqli_query($con1,$query3);
        $row3=mysqli_fetch_array($result3);
        $classid=$row3['class'];
        $labid=$row3['lab'];
        //getting details of class
        $query4="select * from classroom where id='$classid'";
        $result4=mysqli_query($con1,$query4);
        $row4=mysqli_fetch_array($result4);
        $room1=$row4['room'];
        $dept1=$row4['dept'];
        $floor1=$row4['floor'];
        //getting details of lab
        $query5="select * from classroom where id='$labid'";
        $result5=mysqli_query($con1,$query5);
        $row5=mysqli_fetch_array($result5);
        $room2=$row5['room'];
        $dept2=$row5['dept'];
        $floor2=$row5['floor'];
        //displaying details

        ?>
        <h3 align="center" style="color:blue;">Classroom is <?php echo $room1;?> of <?php echo $dept1;?> department, <?php echo $floor1;?> floor and Lab is <?php echo $room2;?> of <?php echo $dept2;?> department , <?php echo $floor2;?> floor</h3>
        
        </div>
        <center>
<button class="backbutton" onclick="doCapture();">Download</button>
        </center>
        <?php
    }
    else{
        ?>
        <script>
            alert("Please select course!");
            window.location.href="studentlogin.php";
        </script>
        <?php
    }
?></body>
</html>