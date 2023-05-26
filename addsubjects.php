<link rel="stylesheet" href="CSS/allotteacher.css">
<?php
    if(isset($_POST['submit'])){
        $course=$_POST['course'];
        $theory=$_POST['theory'];
        $practical=$_POST['practical'];
        $subjectname=[];
        $practicalname=[];
        $con=mysqli_connect("localhost","root","","atg");
        for($i=1;$i<=$theory;$i++){
            $subn="sn";
            $subid="sid";
            $subp="p";
            $subt="t";
            $sn=$subn.$i;
            $sid=$subid.$i;
            $sp=$subp.$i;
            $st=$subt.$i;
            $subjectpriority=$_POST[$sp];
            $subject=$_POST[$sn];
            $subjectname[$i-1]=$subject;
            $id=$_POST[$sid];
            $type="theory";
            $query="insert into $course (sub_name,sub_id,priority,type) values ('$subject','$id','$subjectpriority','$type')";
            mysqli_query($con,$query);
        }
        for($j=0;$j<$practical;$j++){
            $i=$j+1;
            $pn="prn";
            $prid="prid";
            $prp="prp";
            $prt="prt";
            $prn=$pn.$i;
            $pid=$prid.$i;
            $pp=$prp.$i;
            $pt=$prt.$i;
            $subject=$_POST[$prn];
            $practicalname[$j]=$subject;
            $id=$_POST[$pid];
            $type="practical";
            $query="insert into $course (sub_name,sub_id,type) values ('$subject','$id','$type')";
            mysqli_query($con,$query);
        }
        $cq="insert into course (name) values ('$course')";
        mysqli_query($con,$cq);
            $q="update temp set value='1' where id='1'";
            mysqli_query($con,$q);
            ?>
            <div id="form">
                <form action="allotteacher.php" method="POST">
                    <input type="text" name="course" value="<?php echo $course;?>" hidden>
                    <input type="text" name="theory" value="<?php echo $theory;?>" hidden>
                    <input type="text" name="practical" value="<?php echo $practical;?>" hidden>
                    <h1 align="center">Allot Teachers to Subjects</h1>
                    <table align="center" id="formtable">
                        <?php
                        $tt="pt";
                        $prt="prt";
                            for($a=0;$a<$theory;$a++){
                                $ptn=$tt.$a;
                                ?>
                                <tr>
                                    <th><?php echo $subjectname[$a];?></th>
                                    <?php
                                    $q1="select category from subject where sub_name='$subjectname[$a]'";
                                    $r1=mysqli_query($con,$q1);
                                    $rw1=mysqli_fetch_array($r1);
                                    $category=$rw1['category'];
                                    $q2="select tid,tname,interest from teacher order by tname asc";
                                    $r2=mysqli_query($con,$q2);
                                    ?>
                                    <th>
                                       <select name="<?php echo $ptn; ?>" class="input">
                                    <?php
                                    $suggested=[];
                                    
                                    while($rw2=mysqli_fetch_array($r2)){
                                        $si=0;
                                        $tname=$rw2['tname'];
                                        $tid=$rw2['tid'];
                                        $interest=unserialize($rw2['interest']);
                                        foreach($interest as $intr){
                                            if($intr==$category){
                                                $suggested[$si]=$tname;
                                                $si++;
                                                ?>
                                                <option style="background-color:cyan;" value="<?php echo $tid;?>"><?php echo $tname;?></option>
                                                <?php
                                            }
                                            
                                        }
                                    }
                                    $q3="select tid,tname from teacher order by tname asc";
                                    $r3=mysqli_query($con,$q3);
                                    while($rw3=mysqli_fetch_array($r3)){
                                        $tname=$rw3['tname'];
                                        $tid=$rw3['tid'];
                                        $aa=0;
                                        foreach($suggested as $sugg){
                                            if($tname!=$sugg && $aa==sizeof($suggested)-1){
                                                
                                                ?>
                                                <option value="<?php echo $tid;?>"><?php echo $tname;?></option>
                                                <?php
                                            }
                                            $aa++;
                                        }  
                                    }
                                    
                                    ?>
                                   </select></th>
                                </tr>
                                <?php
                            }
                            for($a=0;$a<$practical;$a++){
                                $prtn=$prt.$a;
                                ?>
                                <tr>
                                    <th><?php echo $practicalname[$a];?> (Lab)</th>
                                    <?php
                                    $q1="select category from subject where sub_name='$practicalname[$a]'";
                                    $r1=mysqli_query($con,$q1);
                                    $rw1=mysqli_fetch_array($r1);
                                    $category=$rw1['category'];
                                    $q2="select tid,tname,interest from teacher order by tname asc";
                                    $r2=mysqli_query($con,$q2);
                                    ?>
                                    <th>
                                       <select name="<?php echo $prtn; ?>"  class="input">
                                    <?php
                                    while($rw2=mysqli_fetch_array($r2)){
                                        $tname=$rw2['tname'];
                                        $tid=$rw2['tid'];
                                        $interest=unserialize($rw2['interest']);
                                        foreach($interest as $intr){                                            
                                            if($intr==$category){
                                                ?>
                                                <option style="background-color:cyan;" value="<?php echo $tid;?>"><?php echo $tname;?></option>
                                                <?php
                                            }
                                            
                                        }
                                    }
                                    $q3="select tid,tname from teacher order by tname asc";
                                    $r3=mysqli_query($con,$q3);
                                    while($rw3=mysqli_fetch_array($r3)){
                                        $tname=$rw3['tname'];
                                        $tid=$rw3['tid'];
                                        $aa=0;
                                        foreach($suggested as $sugg){
                                            if($tname!=$sugg && $aa==sizeof($suggested)-1){
                                                
                                                ?>
                                                <option value="<?php echo $tid;?>"><?php echo $tname;?></option>
                                                <?php
                                            }
                                            $aa++;
                                        }  
                                    }
                                    
                                    ?>
                                   </select></th>
                                </tr>
                                <?php
                            }
                        ?>
                        <tr>
                            <th colspan="2"><input type="submit" class="addbutton" name="submit" value="Save"></th>
                        </tr>
                    </table>
                </form>
            </div>
        <?php
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