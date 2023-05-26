<?php
    if (isset($_POST['edit'])){
        $id=$_POST['e'];
        $con=mysqli_connect("localhost","root","","atg");
        $q="select * from classroom where id='$id'";
        $res=mysqli_query($con,$q);
        $row=mysqli_fetch_array($res);
        ?>
        <html>
            <link rel="stylesheet" href="CSS/editclassroom.css">
            <body>
                <div id="form">
                <form action="updateclassroom.php" method="post">
                    <h1 align="center" class="text">Edit Classroom Details</h1>
                    <table align="center" id="formtable">
                        <tr>
                            <th class="label">Room</th>
                            <th><input type="text" class="input" required name="room" value="<?php echo $row['room'];?>"></th>
                        </tr>
                        <tr>
                            <th class="label">Department</th>
                            <th><input type="text" class="input" required name="dept" value="<?php echo $row['dept'];?>" required ></th>
                        </tr>
                        <tr>
                        <th class="label">Floor :</th>
                        <td><select name="floor" class="input">
                            <option value="g">Ground</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th class="label">Room Type: </th>
                        <td><select name="type" class="input">
                            <option value="Lecture hall">Lecture hall</option>
                            <option value="Computer lab">Computer Lab</option>
                            <option value="Electronics lab">Electronics Lab</option>
                        </select></td>
                    </tr>
                        <tr>
                            <th colspan="2"><input type="text" name="id" hidden value="<?php echo $id;?>"></th>
                        </tr>
                        <tr>
                            <th colspan="2"><input type="submit" class="addbutton" name="update" value="Update"></th>
                        </tr>
                    </table>
                </form>
                </div>
            </body>
        </html>
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