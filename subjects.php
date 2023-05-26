
<html>
    <form action="adminmodule.php" method="post">
        <input type="submit" value="Back" class="backbutton" name="back">
    </form>
<?php
    if (isset($_POST['create'])){
        $cname=$_POST['coursename'];
        $theory=$_POST['theory'];
        $practical=$_POST['practical'];
        $con=mysqli_connect("localhost","root","","atg");
        $createT="CREATE TABLE `$cname` ( `sub_name` VARCHAR(40) ,  `sub_id` VARCHAR(5) ,  `priority` VARCHAR(1) ,  `type` VARCHAR(9) ,  `teacher` VARCHAR(35) ,    PRIMARY KEY  (`sub_id`))";

        mysqli_query($con,$createT);
        $query="select * from teacher order by tname asc";
        $sub_query="select * from subject order by sub_name asc";

        
        
        
        
        ?><link rel="stylesheet" href="CSS/subjects.css">
            <form action="addsubjects.php" method="post">
           <table align="center">
            <?php
                for ($i=1;$i<=$theory;$i++){
                    $result=mysqli_query($con,$query);
                    $sub_res=mysqli_query($con,$sub_query);
                    $subn="sn";
                    $subid="sid";
                    $subp="p";
                    $subt="t";
                    $r="row";
                    $s="sub";
                    $sn=$subn.$i;
                    $sid=$subid.$i;
                    $sp=$subp.$i;
                    $st=$subt.$i;
                    $row=$r.$i;
                    $sub=$s.$i;
                    
                    ?>
                    <tr>
                        <th class="label">Subject <?php echo $i;?> Name: </th>
                        <th class="input"><select name="<?php echo $sn;?>">
                            <?php
                                while($sub=mysqli_fetch_array($sub_res)){
                                    ?>
                                    <option value="<?php echo $sub['sub_name'];?>"><?php echo $sub['sub_name'];?></option>
                                    <?php
                                }
                            ?>
                        </select></th>                    </tr>
                    <tr>
                        <th class="label">Subject ID: </th>
                        <th class="input"><input required type="text" name="<?php echo $sid;?>"></th>
                    </tr>
                    <tr>
                        <th class="label">Subject Priority: </th>
                        <th class="input"><input type="text" name="<?php echo $sp;?>"></th>
                    </tr>
                    
                    <tr><th style="height:50px;"></th></tr>
                    
                    <?php
                }
            
                for($j=0;$j<$practical;$j++){
                    $i=$j+1;
                    $result=mysqli_query($con,$query);
                    $sub_res=mysqli_query($con,$sub_query);
                    $pn="prn";
                    $prid="prid";
                    $prp="prp";
                    $prt="prt";
                    $r2="r";
                    $prn=$pn.$i;
                    $pid=$prid.$i;
                    $pp=$prp.$i;
                    $pt=$prt.$i;
                    $row2=$r2.$i;
                    ?>
                    <tr>
                        <th class="label">Practical <?php echo $i;?> Name: </th>
                        <th class="input"><select name="<?php echo $prn;?>">
                            <?php
                                while($sub=mysqli_fetch_array($sub_res)){
                                    ?>
                                    <option value="<?php echo $sub['sub_name'];?>"><?php echo $sub['sub_name'];?></option>
                                    <?php
                                }
                            ?>
                        </select></th>                    </tr>
                    <tr>
                        <th class="label">Practical ID: </th>
                        <th class="input"><input required type="text" name="<?php echo $pid;?>"></th>
                    </tr>
                   
                    <tr><th style="height:50px;"></th></tr>
                    
                    <?php
                }
            ?>
            <input type="text" hidden value="<?php echo $theory;?>" name="theory">
           <input type="text" hidden value="<?php echo $practical;?>" name="practical">
           <input type="text" hidden value="<?php echo $cname;?>" name="course">
                <tr>
                    <th colspan="2"><input class="addbutton" type="submit" name="submit"></th>
                </tr>
           </table> 
           

        </form>
        <?php
    }
    else{
        ?>
        <script>
            alert("Please Login first!");
            window.location.href="adminlogin.html";
        </script>
        <?php
    }
?>
</html>