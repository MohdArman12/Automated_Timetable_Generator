<form align="right" action="teacherlogin.html">
    <input type="submit" class="addbutton" value="LogOut" style="margin:5px 15px;">
</form>
<?php
    if(isset($_POST['submit'])){
        $user=$_POST['tmail'];
        $pass=$_POST['tid'];
        $con1=mysqli_connect("localhost","root","","atg");
        $con2=mysqli_connect("localhost","root","","timetable");
        $query="select * from teacher where tmail='$user'";
        $result=mysqli_query($con1,$query);
        $a=0;
        $b=0;
        $list="";
        $courselist=[];
        $newclass=array();
        $newindex=array();
        $classtime=array();
        $rows=[];
        $index=array();
        $tclass=array();
        $class=array();
        $days=array("Day/Courses","Mon","Tue","Wed","Thu","Fri");
        $courses=[];
        $time=array("");
        $col=[];
        $row=[];
        if($row=mysqli_fetch_array($result)){
            if($pass==$row['tid']){
                $greet="Welcome ".$row['title'].". ".$row['tname']."!<br>";
                echo "<h1>$greet</h1>";
                //getting names of courses for which timetable is created
                $query1="select name from course where timetable='Yes'";
                $result1=mysqli_query($con1,$query1);
                
                while($row1=mysqli_fetch_array($result1)){
                    $courses[$a]=$row1['name'];
                    $a++;
                    
                }
                for ($ij=0;$ij<sizeof($courses);$ij++){
                    $query2="select row,col from timetabledetail where name='$courses[$ij]'";
                    $result2=mysqli_query($con2,$query2);
                    while($row2=mysqli_fetch_array($result2)){
                        
                        $col[$b]=$row2['col'];
                        $row[$b]=$row2['row'];
                        $b++;
                    }
                }
                
                $colsize=sizeof($col);
                $cs=$col[$colsize-1];
        //getting data
        $abc=0;
        for ($i=0;$i<sizeof($courses);$i++){
            $j=0;
            $query3="select * from $courses[$i]";
            $result3=mysqli_query($con2,$query3);
            while($row3=mysqli_fetch_array($result3)){
                $h=1;
                for($k=0;$k<$col[$i];$k++){
                    $c="col";
                    $cc=$c.$h;
                    $class[$i][$j][$k]=$row3[$cc];
                    $h++;
                    $u=$class[$i][$j][$k];
                    if($u!="Break" && $u!="Lab" && substr($u,0,1)!="p" && $u!="09:10-12:00" && $u!="14:00-17:00"){
                        $uu=array_search($class[$i][$j][$k],$time);
                        if($uu==""){
                            $time[$abc]=$class[$i][$j][$k];
                            $abc++;
                        }
                    }
                }
                $j++;
            }
        }
        //getting indices
        for($i=0;$i<sizeof($courses);$i++){
            for($j=0;$j<$row[$i];$j++){
                for($k=0;$k<$col[$i];$k++){
                    $l=substr($class[$i][$j][$k],-3);
                    if ($l==$pass){
                        $tclass[$i][$j][$k]=$k;

                    }
                    else{
                        $tclass[$i][$j][$k]="-";
                    }
                }
            }
           // array_push($rows,$jj);
        }
        $iii=0;
        for($i=0;$i<sizeof($tclass);$i++){
            $ii=0;
            for($j=0;$j<sizeof($tclass[$i]);$j++){
                for($k=0;$k<sizeof($tclass[$i][$j]);$k++){
                    if ($tclass[$i][$j][$k]!="-"){
                        $ii++;                       
//                        break;
                    }
                }
            }
            if($ii!=0){
                $courselist[$iii]=$courses[$i];
                $iii++;
            }
        }
        $yz=0;
        for($i=0;$i<sizeof($courselist);$i++){
            for($j=0;$j<sizeof($courses);$j++){
                if($courselist[$i]==$courses[$j]){
                    for($k=0;$k<sizeof($tclass);$k++){
                        $nn=-1;
                        $xy=0; 
                        for($l=0;$l<sizeof($tclass[$k]);$l++){
                            for($m=0;$m<sizeof($tclass[$k][$l]);$m++){
                                if($tclass[$k][$l][$m]!="-" || $tclass[$k][$l][$m]=="0"){
                                    $newindex[$yz][$nn]= $class[$k][0][$m];
                                    //echo $m."<br>";
                                    //echo $newindex[$yz][$nn]."-".($yz).($nn)."<br>";
                                    $xy++;
                                }
                            }
                            $nn++;
                        }
                        if($xy!=0 ){
                            $yz++;
                        }
                    }
                }
            }
        }
       for($i=0;$i<sizeof($newindex);$i++){
        for($j=0;$j<(sizeof($days)-1);$j++){
            if(array_key_exists($j,$newindex[$i])){
                $classtime[$i][$j]=$newindex[$i][$j];
            }
            else{
                $classtime[$i][$j]="-";
            }
        }
       }
        //transposing the index array
        for($i=0;$i<sizeof($newindex);$i++){
            for($j=0;$j<sizeof($days)-1;$j++){
                $index[$j][$i]=$classtime[$i][$j];
                //echo $index[$j][$i]."    ";
            }
            //echo "<br>";
        }
        /*
        for($i=0;$i<sizeof($class);$i++){
            for($j=0;$j<sizeof($class[$i]);$j++){
                for($k=0;$k<sizeof($class[$i][$j]);$k++){
                    echo $class[$i][$j][$k]."   ,";
                }echo "<br>";
            }
            echo "<br>";
        }
        */
        for($i=0;$i<sizeof($newindex);$i++){
            for($j=0;$j<sizeof($days)-1;$j++){
                if(array_key_exists($j,$newindex[$i])){
                    //array_push()
                }
            }
            //echo "<br>";
        }
        sort($time);
                //creating table
                ?>
                <link rel="stylesheet" href="CSS/teacherschedule.css">
                <table align="center" id="schedule">
                <?php
                
                for($i=0;$i<sizeof($days);$i++){
                    $x=0;
                    ?>
                    <tr>
                    <?php
                    $xyz=0;
                    for($j=0;$j<=sizeof($courselist);$j++){
                        if($j==0){
                            ?>
                            <th class="day"><?php echo $days[$i]; ?></th>
                            <?php
                        }
                        elseif ($i==0) {
                            ?>
                            <th class="course"><?php echo $courselist[$j-1]; ?></th>
                            <?php
                        }
                        else{
                            if($index[$i-1][$j-1] != "-"){
                                $time=explode("-",$index[$i-1][$j-1]);
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
                                <th class="time"><?php echo $newtime; ?></th>
                                <?php
                            }
                            else{
                                ?>
                                <th class="time"><?php echo $index[$i-1][$j-1]; ?></th>
                                <?php
                            }
                        }
                    }
                    ?>
                    </tr>
                    <?php
                }
                ?>
                </table>
                <table align="center" id="classdetails" style="margin-top:70px;">
                    <tr><th colspan="5" class="classroom">Details of Classrooms</th></tr>
                    <tr>
                        <th class="head">Course</th><th class="head">Subject</th><th class="head">Class</th><th class="head">Floor</th><th class="head">Building</th>
                    </tr>
                    <?php
                    for($i=0;$i<sizeof($courselist);$i++){
                        $query4="select class from course where name='$courselist[$i]'";
                            $result4=mysqli_query($con1,$query4);
                            $row4=mysqli_fetch_array($result4);
                            $r=$row4['class'];
                            $query5="select * from classroom where id='$r'";
                            $result5=mysqli_query($con1,$query5);
                            $row5=mysqli_fetch_array($result5);
                            $query6="select sub_name from $courselist[$i] where teacher='$pass'";
                            $result6=mysqli_query($con1,$query6);
                            $row6=mysqli_fetch_array($result6);
                        ?>
                        <tr>
                        <?php
                        for($j=0;$j<5;$j++){
                            if($j==0){
                                ?>
                                <td class="even"><?php echo $courselist[$i];?></td>
                                <?php
                            }
                            if($j==1){
                                ?>
                                <td class="even"><?php echo $row6['sub_name'];?></td>
                                <?php
                            }
                            if($j==2){
                                ?>
                                <td class="even"><?php echo $row5['room'];?></td>
                                <?php
                            }
                            if($j==3){
                                ?>
                                <td class="even"><?php echo $row5['floor'];?></td>
                                <?php
                            }
                            if($j==4){
                                ?>
                                <td class="even"><?php echo $row5['dept'];?></td>
                                <?php
                            }
                        }
                        ?>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Invalid Password, Please enter valid Password!");
                    window.location.href="teacherlogin.html";
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                alert("This Data does not exist, Please enter valid Mail Address");
                window.location.href="teacherlogin.html";
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert("Please login first!");
            window.location.href="teacherlogin.html";
        </script>
        <?php
    }
?>