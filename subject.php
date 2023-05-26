<?php
    $con=mysqli_connect("localhost","root","","atg");
    $q="select value from temp where id='1'";
    $res=mysqli_query($con,$q);
    $row1=mysqli_fetch_array($res);
    if(isset($_POST['subject']) || $row1['value']==1){
        
        $query="select tid from temp where id='1'";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result);
        $id=$row['tid'];
        
        $x=1;
        $q1="update temp set tid='$id' where id='$x'";
        mysqli_query($con,$q1);
        ?>
        <html>
        <link rel="stylesheet" href="CSS/subject.css">
            <form action="adminmodule.php" method="post">
                <input type="submit" name="back" value="Back" class="backbutton">
            </form>
            <div id="table" style="float:left; width:550px; margin-left:100px;">
            <h1 class="text" align="center">List of Categories</h1>
            <table width="320px" style="margin-left:120px;">
            <tr>
                        <th class="th">Category</th>
                        <th class="th">Actions</th>
                    </tr>
                    </tr>
<?php
$q3="select * from sub_category order by category asc";
$res3=mysqli_query($con,$q3);

while($row3=mysqli_fetch_array($res3))
{
	?>
	
	<tr>
	<td class="tr"><?php echo $row3['category'];?></td>
	<td><form method="POST" style="display:inline;" action="editcategory.php">
		<input type="hidden" name="e" value="<?php echo $row3['id'];?>">
	<input type="submit" class="editbutton" name="edit" value="Edit">
	</form>
    <form method="POST" style="display:inline;" action="deletecategory.php">
		<input type="hidden" name="d" value="<?php echo $row3['id'];?>">
	<input type="submit" name="delete" class="deletebutton" value="Delete">
	</form>
	</td>
	</tr>

	<?php
}
?>
            
            </table>
            <br><br>
            <!--subject list-->
            <h1 class="text" align="center">List of Subjects</h1>
            <table width="600px">
            <tr>
                        <th class="th">Subject</th>
                        <th class="th">Category</th>
                        <th class="th">Actions</th>
                    </tr>
                    </tr>
<?php
$q2="select * from subject order by sub_name asc";
$res2=mysqli_query($con,$q2);

while($row2=mysqli_fetch_array($res2))
{
	?>
	
	<tr>
	<td class="tr"><?php echo $row2['sub_name'];?></td>
    <td class="tr"><?php echo $row2['category'];?></td>
	<td><form method="POST" style="display:inline;" action="editsubject.php">
		<input type="hidden" name="e" value="<?php echo $row2['s_id'];?>">
	<input type="submit" class="editbutton" name="edit" value="Edit">
	</form>
    <form method="POST" style="display:inline;" action="deletesubject.php">
		<input type="hidden" name="d" value="<?php echo $row2['s_id'];?>">
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
            <h1 class="text" align="center">Add new category</h1>
            <table  align="center" class="formtable">
            <form action="addcategory.php" method="post">
                    <tr>
                        <th>Category</th>
                        <th><input type="text" class="input" name="category" required placeholder="Enter name of category"></th>
                    </tr>
                    <tr>
                        <th colspan="2"><input type="submit" class="addbutton" id="submit" name="submit" value="Add"></th>
                    </tr>
                
            </form>
    </th></tr></table>
    <hr>
            <!--add subject-->
            <h1 class="text" align="center">Add new subject</h1>
            <table  align="center" class="formtable">
            <form action="addsubject.php" method="post">
                    <tr>
                        <th>Subject Name</th>
                        <th><input type="text" class="input" name="sub_name" required placeholder="Enter Subject's name"></th>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <th><select name="category" class="input">
                            <?php
                                $query_category="select * from sub_category order by category asc";
                                $res_cat=mysqli_query($con,$query_category);
                                while($row_cat=mysqli_fetch_array($res_cat)){
                                    ?>
                                    <option value="<?php echo $row_cat['category'];?>"><?php echo $row_cat['category'];?></option>
                                    <?php
                                }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2"><input type="submit" class="addbutton" id="submit" name="submit" value="Add"></th>
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