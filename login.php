<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
    <center>
        <h2 style="color: greenyellow;  ">Student Management System</h2><br>
        <!-- action means file kon file e jabe setar nam likhbo -->
        <form action="" method="post">
            <input style="  cursor: pointer; color:green"  type= "submit" name="admin_login" value="Admin Login">
             <input style=" cursor:pointer;color:blue" type="submit" name="student_login" value="Student Login">

        </form>
        <?php 
        // button name admin_login
        //  admin_login.php jei file e jabo oitar nam or location
        if(isset($_POST['admin_login'])){
            header("location: admin_login.php");
        }
         
         if(isset($_POST['student_login'])){
            header("location: student_login.php");
         }
         ?>
    </center>
</body>
</html>