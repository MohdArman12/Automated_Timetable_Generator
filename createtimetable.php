<?php
    if(isset($_POST['submit'])){
        //connection making
        $con=mysqli_connect("localhost","root","","atg");
        


        $n=$_POST['index'];
        $days=$_POST['days'];
        //creating arrays to store details
        $lecture=[];
        $labstart=[];
        $labend=[];
        $classtime=[];
        $classduration=[];
        $classgap=[];
        $lunchstart=[];
        $lunchend=[];
        $classallot=[];
        $laballot=[];
        $courses=[];
        $weekdays=array("Mon","Tue","Wed","Thu","Fri","Sat");
        $a=0;
         
        //array for assigning classes
        $classes=array();

        //assign values in array
        for($i=0;$i<$n;$i++){
            //for no. of lectures
            $lecturet="lect";
            $lect=$lecturet.($i+1);
            $lecture[$i]=$_POST[$lect];

            //for courses
            $ctt="c";
            $temptt=$ctt.($i+1);
            
            $courses[$i]=$_POST[$temptt];
            
             //for lab timing
            $labt="lab";
            $labst=$labt.($i+1)."s";
            $labet=$labt.($i+1)."e";
            $labstart[$i]=$_POST[$labst];
            $labend[$i]=$_POST[$labet];

            //class starting
            $classt="cl";
            $ct=$classt.($i+1);
            $classtime[$i]=$_POST[$ct];

            //class duration
            $durationt="cd";
            $cd=$durationt.($i+1);
            $classduration[$i]=$_POST[$cd];

            //lunch timing
            $luncht="lunch";
            $lunchst=$luncht.($i+1)."s";
            $lunchet=$luncht.($i+1)."e";
            $lunchstart[$i]=$_POST[$lunchst];
            $lunchend[$i]=$_POST[$lunchet];

            //class allotments
            $classallott="callot";
            $callot=$classallott.($i+1);
            $classallot[$i]=$_POST[$callot];

            //lab allotments
            $laballott="lallot";
            $lallot=$laballott.($i+1);
            $laballot[$i]=$_POST[$lallot];
        }
        for($i=0;$i<$n;$i++){
            $query="update course set class='$classallot[$i]', lab='$laballot[$i]', timetable='Yes' where name='$courses[$i]'";
            mysqli_query($con,$query);
        }
        //query
        $query=[];
        
        $row=[];
        $row2=[];
        $row3=[];
        $idno=0;
        $subid=array();
        $teacher=array();
        $subteach=array();
        $random=array();
        for($i=0;$i<$n;$i++){
            $jj=0;
            $query[$i]="select * from $courses[$i] where type='theory'";
            
            $row1[$i]=mysqli_query($con,$query[$i]);
            
            while($f=mysqli_fetch_array($row1[$i])){
                
                $subid[$i][$jj]=$f['sub_id'];
                $teacher[$i][$jj]=$f['teacher'];
                $subteach[$i][$jj]=$subid[$i][$jj]."-".$teacher[$i][$jj];
                $jj++;
            }
        }
        
        for($i=0;$i<$n;$i++){
            $aa=0;
            for($j=0;$j<sizeof($subid[$i]);$j++){
                $random[$i][$j]=$aa;
                $aa++;
            }
        }
        // adding minutes
        
        $minadd=array();
        $labtiming=[];
        $lunchtiming=[];
        //lab and lunch timing
        for($i=0;$i<$n;$i++){
            $lunchtiming[$i]=$lunchstart[$i]."-".$lunchend[$i];
            $labtiming[$i]=$labstart[$i]."-".$labend[$i];
        }
            
        
        
        for($i=0;$i<$n;$i++){
            $tt=$classtime[$i];
            for($j=0;$j<($lecture[$i]);$j++){
                $xx=[];
                $xx=explode(":",$tt);
                $xx[1]+=$classduration[$i];
                if($xx[1]>=60){
                    $xx[1]-=60;
                    if($xx[1]==0){
                        $xx[1]="00";
                    }
                    $xx[0]+=1;
                }
                
                $minadd[$i][$j]=$xx[0].":".$xx[1];
                $tt=$minadd[$i][$j];
                
            }
            
        }
        //finding indexes of lunch and lab timing
        $labindex=array();
        $lunchindex=array();
        

        //creating array for calculation
        $times=array();
        $temparr=[];
        $classstart=[];
        $classindex=[];
        $sortedarray=[];

        $index1=array(
            /*array(
                array(0,5,2,3,4),
                array(0,1,2,5,4),
                array(0,1,2,3,4),
                array(0,1,5,3,4),
                array(5,1,2,3,0)
            ),*/
            array(
                array(5,0,2,3,1),
                array(5,0,2,4,1),
                array(5,3,2,4,1),
                array(5,0,2,4,1),
                array(3,0,1,5,3)
            ),
            array(
                array(4,3,2,0,5),
                array(2,3,4,0,5),
                array(2,3,4,1,5),
                array(5,1,2,0,4),
                array(1,3,1,0,5)
            ),
            array(
                array(1,3,5,4,0),
                array(4,3,0,1,5),
                array(4,3,5,2,1),
                array(4,3,5,2,0),
                array(0,4,5,2,1)
            ),
            array(
                array(2,1,4,0,5),
                array(3,2,4,0,5),
                array(3,1,4,2,0),
                array(3,1,4,0,5),
                array(3,1,2,0,5)
            ),
            array(
                array(0,2,3,1,5),
                array(4,0,3,2,5),
                array(4,0,1,2,5),
                array(4,0,1,2,3),
                array(4,5,1,2,3)
            ),
            array(
                array(3,4,5,0,2),
                array(0,4,5,3,1),
                array(0,2,5,3,1),
                array(2,4,5,0,1),
                array(0,4,2,3,1)
            )
        );
        //shuffle($index1);
        $index2=array(
            array(0,2,3,4),
            array(0,1,2,4),
            array(1,2,3,4),
            array(0,1,3,4),
            array(1,2,3,0)
        );
        for($i=0;$i<$n;$i++){
            if($lecture[$i]==5){
                $temparr=array($labstart[$i]."-".$labend[$i],$classtime[$i]."-".$minadd[$i][0],$minadd[$i][0]."-".$minadd[$i][1],$minadd[$i][1]."-".$minadd[$i][2],$minadd[$i][2]."-".$minadd[$i][3],$minadd[$i][3]."-".$minadd[$i][4],$lunchstart[$i]."-".$lunchend[$i]);
                sort($temparr);
                $classstart[$i]=$classtime[$i]."-".$minadd[$i][0];
                $classindex[$i]=array_search($classstart[$i],$temparr);
                
                $labti=array_search($labtiming[$i],$temparr);
                $lunti=array_search($lunchtiming[$i],$temparr);
                $times[$i][0]=$temparr[0];
                $times[$i][1]=$temparr[1];
                $times[$i][2]=$temparr[2];
                $times[$i][3]=$temparr[3];
                $times[$i][4]=$temparr[4];
                $times[$i][5]=$temparr[5];
                $times[$i][6]=$temparr[6];
                $lunchindex[$i]=$lunti;
                $labindex[$i]=$labti;
                
            }
            else{
                $temparr=array($labstart[$i]."-".$labend[$i],$classtime[$i]."-".$minadd[$i][0],$minadd[$i][0]."-".$minadd[$i][1],$minadd[$i][1]."-".$minadd[$i][2],$minadd[$i][2]."-".$minadd[$i][3],$lunchstart[$i]."-".$lunchend[$i]);
                sort($temparr);
                $classstart[$i]=$classtime[$i]."-".$minadd[$i][0];
                $classindex[$i]=array_search($classstart[$i],$temparr);
                //echo $classindex[$i];
                $labti=array_search($labtiming[$i],$temparr);
                $lunti=array_search($lunchtiming[$i],$temparr);
                $times[$i][0]=$temparr[0];
                $times[$i][1]=$temparr[1];
                $times[$i][2]=$temparr[2];
                $times[$i][3]=$temparr[3];
                $times[$i][4]=$temparr[4];
                $times[$i][5]=$temparr[5];
                $lunchindex[$i]=$lunti;
                $labindex[$i]=$labti;
            }  
        }
        
        //printing timetable
        ?>
        <link href="CSS/createtimetable.css" rel="stylesheet">
        <form action="uploadtimetable.php" method="post">
        <input type="text" hidden name="row" value="<?php echo $days+1;?>">
                <input type="text" hidden name="n" value="<?php echo $n;?>">
            <?php
            for($i=0;$i<$n;$i++){
                ?>
                
                <table align="center">
                    <tr><th class="coursename" colspan="<?php echo $lecture[$i]+3?>"><h3 align="center"><input type="text" hidden name="<?php echo "course".$i;?>" value="<?php echo $courses[$i];?>">Timetable for <?php echo $courses[$i];?></h3></th></tr>
                    <?php
                    for($j=0;$j<=$days;$j++){
                        $ri=0;
                        $ci=0;
                        shuffle($random[$i]);
                        $td=$j-1;
                        if ($i==0 && $j>0){
                            
                            while($ci<$lecture[$i]){
                                $classes[$i][$td][$ci]=$random[$i][$ci];
                                $tc=$j;
                                $ci++;
                            }
                        }
                        elseif($i>0 && $j>0){
                            while($ci<$lecture[$i]){
                                for($ta=$i;$ta>0;$ta--){
                                    if($random[$i][$ci]==$classes[$i-1][$j-1][$ci]){
                                        $classes[$i][$j-1][$ci]=$random[$i][sizeof($random[$i])-1];
                                    }
                                    else{
                                        $classes[$i][$j-1][$ci]=$random[$i][$ci];

                                    }
                                    
                                }
                                $ci++;
                            }
                        }
                        
                        
                        ?>
                        <tr>
                            <?php
                            $c=0;
                            for($k=0;$k<=($lecture[$i]+2);$k++){
                              // echo $lecture[$i]." ,   ";
                                if($j==0 && $k==0){
                                ?>
                                <th class="day">Day/Time</th>
                                <?php
                                }
                                elseif($k==0){
                                    ?>
                                    <th class="day"><?php echo $weekdays[($j-1)];?></th>
                                    <?php
                                }
                                elseif($j==0 && $k>0){
                                    ?>
                                    <th class="time"><input type="text" hidden name="<?php echo "c".$i.$j.$k;?>" value="<?php echo $times[$i][$k-1];?>"><?php echo $times[$i][($k-1)];?></th>
                                    <?php
                                }
                                elseif ($labindex[$i]==$k-1) {
                                    ?>
                                    <th class="class"><input type="text" hidden name="<?php echo "c".$i.$j.$k;?>" value="Lab"><?php echo "Lab";?></th>
                                    <?php
                                }
                                elseif ($lunchindex[$i]==$k-1) {
                                    ?>
                                    <th class="class"><input type="text" hidden name="<?php echo "c".$i.$j.$k;?>" value="Break"><?php echo "Break";?></th>
                                    <?php
                                }
                                else{
                                    
                                    $iii=$random[$i][$ri];
                                    $ccc=$classes[$i][$j-1][$c-($classindex[$i]+1)];
                                    if($lecture[$i]==5){
                                        if($classtime[$i]=="09:10"){
                                            $cc2=$index1[$i][$j-1][$k-1];
                                            //echo ." ,  ";
                                            ?>
                                                <th class="class"><input type="text" hidden name="<?php echo "c".$i.$j.$k;?>" value="<?php echo $subteach[$i][$cc2];?>"><?php echo $subteach[$i][$cc2];?></th>
                                            <?php 
                                        }
                                        else{
                                            $cc2=$index1[$i][$j-1][$k-3];
                                            //echo ." ,  ";
                                            ?>
                                                <th class="class"><input type="text" hidden name="<?php echo "c".$i.$j.$k;?>" value="<?php echo $subteach[$i][$cc2];?>"><?php echo $subteach[$i][$cc2];?></th>
                                            <?php 
                                        }
                                           
                                    }
                                    else{
                                        $cc2=$index2[$j-1][$k-1];
                                    //echo ." ,  ";
                                    ?>
                                        <th class="class"><input type="text" hidden name="<?php echo "c".$i.$j.$k;?>" value="<?php echo $subteach[$i][$cc2];?>"><?php echo $subteach[$i][$cc2];?></th>
                                    <?php    
                                    }
                                                        
                                    $ri++;
                                }
                                $c++;
                            }
                            ?>
                        </tr>
                        
                        <?php

                    }

                    ?>
                    <tr>
                        
                        <th class="room" colspan="<?php echo $lecture[$i]+3;?>"><input type="text" hidden name="<?php echo "col".$i;?>" value="<?php echo $lecture[$i]+2;?>">Classroom ID : <?php echo $classallot[$i];?></th>
                    </tr>
                    <tr>
                        
                        <th class="room" colspan="<?php echo $lecture[$i]+3;?>">Lab ID : <?php echo $laballot[$i];?></th>
                    </tr>
                    <br><br><br><br>
                </table>
                <?php
            }
            ?><br><br>
            <center>
            <input type="submit" class="addbutton" name="submit" value="Upload">
        </center>
        </form>
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