<?php
    $con=mysqli_connect("localhost","root","","atg");
    $q="select value from temp where id='1'";
    $res=mysqli_query($con,$q);
    $row1=mysqli_fetch_array($res);
    if(isset($_POST['course']) || $row1['value']==1){
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
            <head>
            </head>
            <body>
            <link rel="stylesheet" href="CSS/course.css">
            <form action="adminmodule.php" method="post">
                <input type="submit" name="back" class="backbutton" value="Back" >
            </form>
            <div id="table" style="float:left; margin-left:100px;">
            <h1 align="center" class="text">List of available courses</h1>
            <table align="center">
            <tr>
                        <th class="th">ID</th>
                        <th class="th">Name</th>
                        <th class="th">Class</th>
                        <th class="th">Lab</th>
                        <th class="th">Timetable</th>
                        <th class="th">Delete</th>
                    </tr>
                    </tr>
<?php
$q2="select * from course order by name asc";
$res2=mysqli_query($con,$q2);

while($row2=mysqli_fetch_array($res2))
{
	?>
	
	<tr>
	<td><?php echo $row2['id'];?></td>
	<td><?php echo $row2['name'];?></td>
    <td><?php echo $row2['class'];?></td>
    <td><?php echo $row2['lab'];?></td>
    <td><?php echo $row2['timetable'];?></td>
	
	<td><form method="POST" action="deletecourse.php">
		<input type="hidden" name="d" value="<?php echo $row2['name'];?>">
	<input type="submit" name="delete" class="deletebutton" value="Delete">
	</form>
	</td>
	</tr>

	<?php
}
?>
            
            </table>
            </div>
            
            <!--addition starts here-->
            <div id="form" style=" float:right; margin-right:100px;">
            <h1 align="center">Add new course</h1>
            <form action="subjects.php" method="post">
                    <table align="center" id="formtable">
                        <tr>
                            <th class="label">Course name</th>
                            <th><input type="text" class="input" required name="coursename" placeholder="Enter course name"></th>
                        </tr>
                        <tr>
                            <th class="label">No. of theory subjects</th>
                            <td><select name="theory" class="input" required>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select></td>
                        </tr>
                        <tr>
                            <th class="label">No. of practical subjects</th>
                            <td><select name="practical" class="input" required>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select></td>
                        </tr>
                        <tr>
                            <th colspan="2"><input type="submit" class="addbutton" name="create"></th>
                        </tr>
                    </table>
                </form>
</div>
            </body>
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