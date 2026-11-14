<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Page</title>
</head>

<body>
    <center>
        <h2 style="color: greenyellow;">Student Login</h2><br>
        <!-- action means file kon file e jabe setar nam likhbo -->
        <form action="" method="POST">
            <input type="text" name="email" required placeholder="Enter email"> <br> <br>
            <input type="password" name="pasword" required placeholder="Enter Pasword"><br> <br>
            <input style="cursor:pointer" type="submit" name="submit">

        </form>
       
        <?php
        // isset() check করে submit button-এর data এসেছে কি না।
        if (isset($_POST['submit'])) {

            // এটি MySQL Database-এর সঙ্গে PHP-এর connection তৈরি করে।
            $connection = mysqli_connect("localhost", "root", "");

            // তুমি যখন MySQL-এর সঙ্গে connection তৈরি করলে, তখন কোন database ব্যবহার করবে সেটি select করতে হবে।
            $db = mysqli_select_db($connection, "sms");

            //   এখানে HTML form থেকে user-এর দেওয়া email এবং password নেওয়া হচ্ছে।
            $email = $_POST['email'];
            $password = $_POST['pasword'];

            $query = "SELECT * FROM student WHERE email='$email'";
            
            // এখানে mysqli_query() দিয়ে SQL Query-টি database-এ execute করা হচ্ছে।
            $query_run = mysqli_query($connection, $query);

            if (mysqli_num_rows($query_run) > 0) {

                //    এখানে mysqli_fetch_assoc() database থেকে একটি row নিয়ে associative array তৈরি করে।
                $row = mysqli_fetch_assoc($query_run);

                if ($row['Email'] == $email) {
                    if ($row['PAsword'] == $password) {
                        // echo "Login Successful";
                        header("location: student_dashboard.php");
                    } else {
                        echo "Wrong Password";
                    }
                }
            } else {
                echo "Wrong Email";
            }
        }
        ?>



    </center>
</body>

</html>