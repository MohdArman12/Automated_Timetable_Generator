<?php
    $con=mysqli_connect("localhost","root","","atg");
    $q="select value from temp where id='1'";
    $res=mysqli_query($con,$q);
    $row1=mysqli_fetch_array($res);
    if(isset($_POST['teacher']) || $row1['value']==1){
        
        $query="select tid from temp where id='1'";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result);
        $id=$row['tid'];
        $id++;
        $x=1;
        $q1="update temp set tid='$id' where id='$x'";
        mysqli_query($con,$q1);
        ?>
        <html>
        <link rel="stylesheet" href="CSS/teacher.css">
            <form action="adminmodule.php" method="post">
                <input type="submit" class="backbutton" name="back" value="Back" >
            </form>
            <div id="table" style="float:left;  margin-left:100px;">
            <h1 align="center" class="text">List of Teachers</h1>
            <table  width="100%">
            <tr>
                        <th class="th">ID</th>
                        <th class="th">Title</th>
                        <th class="th">Name</th>
                        <th class="th">Contact No.</th>
                        <th class="th">Email</th>
                        <th class="th">Interests</th>
                        <th class="th">Actions</th>
                    </tr>
                    </tr>
<?php
$q2="select * from teacher order by tname asc";
$res2=mysqli_query($con,$q2);

while($row2=mysqli_fetch_array($res2))
{
	?>
	
	<tr>
	<td><?php echo $row2['tid'];?></td>
    <td><?php echo $row2['title'];?></td>
	<td><?php echo $row2['tname'];?></td>
	<td><?php echo $row2['tphone'];?></td>
	<td><?php echo $row2['tmail'];?></td>
    <td><?php 
        $interests=unserialize($row2['interest']);
        
        echo "<ul>";
        foreach($interests as $intre) {
            echo "<li>$intre</li>";
        }
        echo "</ul>"
    ?></td>
	<th style="padding-left:-5px">
        <form method="POST" style="display:inline;" action="editteacher.php">
		<input type="hidden" name="e" value="<?php echo $row2['tid'];?>">
	<input type="submit" class="editbutton" name="edit" value="Edit">
	</form><form method="POST" style="display:inline;" action="deleteteacher.php">
		<input type="hidden" name="d" value="<?php echo $row2['tid'];?>">
	<input type="submit" name="delete" class="deletebutton" value="Delete">
	</form>
	</th>
	</tr>

	<?php
}
?>
            
            </table>
            </div>
            <div id="form" style=" float:right; margin-right:100px;">
            <h1 align="center" class="text">Add new teacher</h1>
            <table id="formtable" align="center"    >
            <form action="addteacher.php" method="post">
                
                    <tr>
                        <th class="label">ID</th>
                        <th><input type="text" id="id" class="input" name="tid" value="<?php echo $id;?>"></th>
                    </tr>
                    <tr>
                        <th class="label">Name</th>
                        <th><select class="input" name="title">
                            <option value="Dr">Dr.</option>
                            <option value="Er">Er.</option>
                            <option value="Mr">Mr.</option>
                            <option value="Ms">Ms.</option>
                        </select>
                        <input type="text" class="input" name="tname" required placeholder="Enter name"></th>
                    </tr>
                    <tr>
                        <th class="label">Contact No.</th>
                        <th><input type="number" class="input" name="tphone" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" placeholder="Don't type country code"></th>
                    </tr>
                    <tr>
                        <th class="label">Email</th>
                        <th><input type="email" class="input" name="tmail" placeholder="Enter mailing address" required></th>
                    </tr>
                    <tr>
                        <th class="label">Interests</th>
                        <td style="display:flex;"><select class="input" name="interest[]" multiple required>
                                <?php
                                $int_query="select category from sub_category order by category asc";
                                $int_result=mysqli_query($con,$int_query);
                                while($int_row=mysqli_fetch_array($int_result)){
                                    ?>
                                    <option value="<?php echo $int_row['category'];?>"><?php echo $int_row['category'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <p style="font-size:12px; color:green; margin-top:25px; margin-left:10px;">Press Ctrl and<br>click, In case of<br>multiple selections.</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2"><input type="submit" class="addbutton" name="submit" value="Add"></th>
                    </tr>
                
            </form>
    </th></tr></table>
            </div>
            
        </html>
        <?php
        $x=1;
        $y=0;
        $q1="update temp set value='$y' where id='$x'";
        mysqli_query($con,$q1);
        $con->close();
        
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