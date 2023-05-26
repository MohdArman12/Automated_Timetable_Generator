<?php
if(isset($_POST['edit'])){
    $sid=$_POST['e'];
    $con=mysqli_connect("localhost","root","","atg");
    $q="select * from sub_category where id='$sid'";
    $res=mysqli_query($con,$q);
    $row=mysqli_fetch_array($res);
    ?>
    <html>
    <link href="CSS/timetabledetail.css" rel="stylesheet">
        <body>
            <div id="form" style="margin-left:35%; height:350px;">
            <form action="updatecategory.php" method="post">
                <h1 align="center" class="text" style="margin-top:120px; padding-top:50px; font-size:40px;">Edit Subject's Details</h1>
                <table align="center" align="center" id="formtable">
                    <tr>
                        <th class="label">Change Name</th>
                        <th><input class="input" style="width:300px;" type="text" required name="category" value="<?php echo $row['category'];?>"></th>
                    </tr>
                    
                    <tr>
                        <th colspan="2"><input type="text" name="id" hidden value="<?php echo $sid;?>"></th>
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
       