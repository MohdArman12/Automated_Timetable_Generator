<?php
    if (isset($_POST['edit'])){
        $tid=$_POST['e'];
        $con=mysqli_connect("localhost","root","","atg");
        $q="select * from teacher where tid='$tid'";
        $res=mysqli_query($con,$q);
        $row=mysqli_fetch_array($res);
        ?>
        <html>
            <link rel="stylesheet" href="CSS/editteacher.css">
            <body>
                <div id="form">
                <form action="updateteacher.php" method="post">
                    <h1 align="center" class="text">Edit Teacher's Details</h1>
                    <table align="center" align="center" id="formtable">
                        <tr>
                            <th class="label">Name</th>
                            <td>
                            <select class="input" name="title" style="width:80px;">
                            <option value="Dr">Dr.</option>
                            <option value="Er">Er.</option>
                            <option value="Mr">Mr.</option>
                            <option value="Ms">Ms.</option>
                        </select>    
                            <input style="width:250px;" type="text" style="margin-left:10px;" class="input" required name="tname" value="<?php echo $row['tname'];?>"></td>
                        </tr>
                        <tr>
                            <th class="label">Contact No.</th>
                            <td><input style="margin-left:10px;" class="input" type="number" required name="tphone" value="<?php echo $row['tphone'];?>" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" ></td>
                        </tr>
                        <tr>
                            <th class="label">Email</th>
                            <td><input style="margin-left:10px;" class="input"  type="email" value="<?php echo $row['tmail'];?>" required name="tmail" ></td>
                        </tr>
                        <tr>
                        <th class="label">Interests</th>
                        <td style="display:flex;"><select style="margin-left:10px;" class="input" name="interest[]"  multiple required>
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
                            <p style="font-size:12px; color:red; margin-top:25px; margin-left:10px;">Please reselect<br>the interests for<br>this teacher.</p>
                        </td>
                    </tr>
                        <tr>
                            <th colspan="2"><input type="text" name="tid" hidden value="<?php echo $tid;?>"></th>
                        </tr>
                        <tr>
                            <th colspan="2"><input class="addbutton" type="submit" name="update" value="Update"></th>
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