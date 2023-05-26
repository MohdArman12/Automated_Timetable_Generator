<?php
if(isset($_POST['edit'])){
    $sid=$_POST['e'];
    $con=mysqli_connect("localhost","root","","atg");
    $q="select * from subject where s_id='$sid'";
    $res=mysqli_query($con,$q);
    $row=mysqli_fetch_array($res);
    ?>
    <html>
    <link href="CSS/timetabledetail.css" rel="stylesheet">
        <body>
            <div id="form" style="margin-left:35%; height:350px;">
            <form action="updatesubject.php" method="post">
                <h1 align="center" class="text" style="margin-top:120px; padding-top:50px; font-size:40px;">Edit Subject's Details</h1>
                <table align="center" align="center" id="formtable">
                    <tr>
                        <th class="label">Name</th>
                        <th><input class="input" style="width:300px;" type="text" required name="sname" value="<?php echo $row['sub_name'];?>"></th>
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
                        <th colspan="2"><input type="text" name="s_id" hidden value="<?php echo $sid;?>"></th>
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
        alert("Please Login First!");
        window.location.href="adminlogin.html";
     </script>
    <?php
}
       