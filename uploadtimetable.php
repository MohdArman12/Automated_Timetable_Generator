<?php
    if(isset($_POST['submit'])){
        $n=$_POST['n'];
        $row=$_POST['row'];
        $courses=[];
        $addrow=array();
        $table=array();
        $col=[];
        $rowdata=array();
        $data=array();
        $con1=mysqli_connect("localhost","root","","atg");
        $q="update temp set value='1' where id='1'";
        mysqli_query($con1,$q);
        $con=mysqli_connect("localhost","root","","timetable");
        $column=array();
        for($i=0;$i<$n;$i++){
            $course="course".$i;
            $c="col".$i;
            $courses[$i]=$_POST[$course];
            $col[$i]=$_POST[$c];
            for($j=0;$j<$row;$j++){
                $cc="";
                for($k=1;$k<=$col[$i];$k++){
                    $column[$i][$k-1]="col".$k;
                    $dd="c".$i.$j.$k;
                    $data[$i][$j][$k-1]=$_POST[$dd];
                    if($k!=$col[$i]){
                        $cc=$cc."'".$data[$i][$j][$k-1]."',";
                    }
                    else{
                        $cc=$cc."'".$data[$i][$j][$k-1]."'";
                    }
                }
                $rowdata[$i][$j]=$cc;
                
            }
        }
        //checking existence of tables in a database
        for ($i=0;$i<$n;$i++){
            $qq="select * from $courses[$i]";
            $rr=mysqli_query($con,$qq);
            if($rr){
                $d="drop table $courses[$i]";
                mysqli_query($con,$d);
            }
            $dc="select * from timetabledetail where name='$courses[$i]'";
            $dq=mysqli_query($con,$dc);
            if($dq){
                $delete="delete from timetabledetail where name='$courses[$i]'";
                mysqli_query($con,$delete);
            }
        }
        for($i=0;$i<$n;$i++){
            $t="";
            $r="";
                for($j=0;$j<$col[$i];$j++){
                    if($j!=$col[$i]-1){
                        $t=$t."`".$column[$i][$j]."` VARCHAR(12) , ";
                        $r=$r.$column[$i][$j].",";

                    }
                    else{
                        $t=$t."`".$column[$i][$j]."` VARCHAR(12)";
                        $r=$r.$column[$i][$j];
                    }
                    
                    
                }
                $column[$i]=$r;
            $createT="CREATE TABLE `$courses[$i]` ($t)";
            mysqli_query($con,$createT);
        }
        for($i=0;$i<$n;$i++){
            for($j=0;$j<$row;$j++){
                $tt=$rowdata[$i][$j];
                $addquery="insert into $courses[$i] ($column[$i]) values ($tt)";
                mysqli_query($con,$addquery);
                
            }
            $detail="insert into timetabledetail (name,row,col) values ('$courses[$i]','$row','$col[$i]')";
            mysqli_query($con,$detail);
        }
        ?>
        <script>
            alert("Timetable Uploaded Successfully!");
            window.location.href="adminmodule.php";
        </script>
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