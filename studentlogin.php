<form action="home.html">
    <input type="submit" class="backbutton" value="Back">
</form>


<?php 
    $con=mysqli_connect("localhost","root","","timetable");
    $query="select * from timetabledetail order by name asc";
    $result=mysqli_query($con,$query);
    ?>
    <link rel="stylesheet" href="CSS/studentlogin.css">
    <div id="form">
    <h1 align="center">Select your course to view Timetable</h1>
    <form action="studenttimetable.php" method="post">
        <table align="center" id="formtable">
            <tr>
                <th class="label">Select your Course : </th>
                <th class="input"><select name="course">
                    <?php
                    while($row=mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                        <?php
                    }
                    ?>
                    </select>
                </th>
            </tr>
            <tr><th colspan="2"><input type="submit" class="addbutton" name="submit" value="View"></th></tr>
        </table>
    </form>
                </div>
    <?php
?>