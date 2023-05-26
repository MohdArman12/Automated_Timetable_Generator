<?php
    $con=mysqli_connect("localhost","root","","atg");
    $q="select value from temp where id='1'";
    $res=mysqli_query($con,$q);
    $row1=mysqli_fetch_array($res);
    if(isset($_POST['classroom']) || $row1['value']==1){
        
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
        <link rel="stylesheet" href="CSS/classroom.css">
            <form action="adminmodule.php" method="post">
                <input type="submit" name="back" class="backbutton" value="Back" >
            </form>
            <div id="table" style="float:left;  margin-left:100px;">
            <h1 align="center" class="text" style="margin-right:250px;">List of available classrooms</h1>
            <table >
            <tr>
                        <th class="th">ID</th>
                        <th class="th">Room</th>
                        <th class="th">Department</th>
                        <th class="th">Floor</th>
                        <th class="th">Type</th>
                        <th class="th">Actions</th>
                    </tr>
                    </tr>
<?php
$q2="select * from classroom";
$res2=mysqli_query($con,$q2);

while($row2=mysqli_fetch_array($res2))
{
	?>
	
	<tr>
    <td><?php echo $row2['id'];?></td>
	<td><?php echo $row2['room'];?></td>
    <td><?php echo $row2['dept'];?></td>
    <td><?php echo $row2['floor'];?></td>
    <td><?php echo $row2['type'];?></td>
	<td><form method="POST" style="display:inline;" action="editclassroom.php">
		<input type="hidden" name="e" value="<?php echo $row2['id'];?>">
	<input type="submit" class="editbutton" name="edit" value="Edit">
	</form>
    <form method="POST" style="display:inline;" action="deleteclassroom.php">
		<input type="hidden" name="d" value="<?php echo $row2['id'];?>">
	<input type="submit" name="delete" class="deletebutton" value="Delete">
	</form>
	</td>
	</tr>

	<?php
}
?>
            
            </table>
            </div>
            <div id="form" style=" float:right; margin-right:100px;">
            <h1 align="center" class="text">Add new classroom</h1>
            <table id="formtable" align="center">
            <form action="addclassroom.php" method="post">
                    <tr>
                        <th class="label">Room ID</th>
                        <th><input type="text" class="input" name="room" required placeholder="Enter room id/name"></th>
                    </tr>
                    <tr>
                        <th class="label">Department Name</th>
                        <th><input type="text" class="input" name="dept" required placeholder="Enter department's name"></th>
                    </tr>
                    <tr>
                        <th class="label">Floor</th>
                        <td><select name="floor" class="input">
                            <option value="g">Ground</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th class="label">Room Type</th>
                        <td><select name="type" class="input">
                            <option value="Lecture hall">Lecture hall</option>
                            <option value="Computer lab">Computer Lab</option>
                            <option value="Electronics lab">Electronics Lab</option>
                        </select></td>
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