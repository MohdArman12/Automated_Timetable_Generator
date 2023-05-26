<form action="home.html" method="post">
    <input type="submit" name="back" id="back" value="LogOut" style="border-radius:15px; height:35px; width:80px;">
</form>
<?php
    $con=mysqli_connect("localhost","root","","atg");
    $query="select value from temp where id='1'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
    if($row['value']==1 || isset($_POST['back'])){
?>
<html>
    <head>
    <link rel="stylesheet" href="CSS/adminmodule.css">
        <title>Welcome!</title>
        <style>
            
        </style>
        
    </head>
    <body>
    <div class="content">
        <table align="center">
            <tr>
        
            <div class="text">Select option to perform activities</div>
            <th>
            <form action="course.php" method="post">
                <div class="field">
                    <input type="submit" class="button" value="Courses" name="course">
                </div>
            </form></th>
            <th><form action="subject.php" method="post">
                <div class="field">
                    <input type="submit" class="button" value="Subjects" name="subject">
                </div>    
            </form></th>
            <th><form action="teacher.php" method="post">
                <div class="field">
                    <input type="submit" class="button" value="Teachers" name="teacher">
                </div>
            </form></th>
            <th><form action="classroom.php" method="post">
                <div class="field">
                    <input type="submit" class="button" value="Classrooms" name="classroom">
                </div>
            </form></th>
            <th><form action="timetable.php" method="post">
                <div class="field">
                    <input type="submit" class="button" value="Timetable" name="timetable">
                </div>
            </form></th>
        
    </tr>
    </table>
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