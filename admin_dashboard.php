<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <style>
        #header {
            background-color: aquamarine;
            padding: 20px;
            margin-bottom: 10px;
        }
    </style>

    <?php
    session_start();

    //data featch
    $connection = mysqli_connect("localhost", "root", "");

    // তুমি যখন MySQL-এর সঙ্গে connection তৈরি করলে, তখন কোন database ব্যবহার করবে সেটি select করতে হবে।
    $db = mysqli_select_db($connection, "sms");

    //   এখানে HTML form থেকে user-এর দেওয়া email এবং password নেওয়া হচ্ছে।
    // $email = $_POST['email'];
    // $password = $_POST['pasword'];




    ?>

</head>

<body>

    <span id="top_span">
        <marquee> This is Admin Dashboard page</marquee>
    </span>

    <div id="header">
        <center style=" font:bold;font-size:20px;">Student management system <span style="color:yellowgreen">email: <?php echo $_SESSION['email'] ?> </span> </center>

        <a href="logout.php">Logout</a>
    </div>
    <div id="left-side">
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <input style="cursor:pointer;color:black" type="submit" name="search_student" value="search student"> <br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input style="cursor:pointer;color:black" type="submit" name="edit_student" value="Edit student"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="cursor:pointer;color:black" type="submit" name="add_new_student" value="Add_new student"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="cursor:pointer;color:black" type="submit" name="delete_student" value="Delete student">
                    </td>
                </tr>
            </table>
        </form>
    </div>



    <div id="right-side"><br><br>
        <div id="demo">
            <?php
            if (isset($_POST['search_student'])) {

            ?>
                <center>
                    <form action="" method="post">
                        Enter Student Id:
                        <input type="text" name="Student_id">
                        <input type="submit" name="search_by_roll_no" value="search">
                    </form>
                </center>

                <?php

            }
            if (isset($_POST['search_by_roll_no'])) {
                $Student_id = $_POST['Student_id'];

                $query = "SELECT * FROM student WHERE Sudent_id='$_POST[Student_id]'";

                // এখানে mysqli_query() দিয়ে SQL Query-টি database-এ execute করা হচ্ছে।
                $query_run = mysqli_query($connection, $query);

                if (mysqli_num_rows($query_run) > 0) {

                    //    এখানে mysqli_fetch_assoc() database থেকে একটি row নিয়ে associative array তৈরি করে।
                    $row = mysqli_fetch_assoc($query_run);
                ?>
                    <!-- show data display -->
                    <table>

                        <tr>
                            <!-- print name -->
                            <td><b>Name:</b></td>
                            <td>

                                <input type="text" value="<?php echo $row['Name']; ?>" disabled>
                            </td>
                        </tr> <br>

                        <tr>
                            <td><b>Roll No:</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['Sudent_id']; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <!-- print name -->
                            <td><b>Email:</b></td>
                            <td>

                                <input type="text" value="<?php echo $row['Email']; ?>" disabled>
                            </td>
                        </tr> <br>


                        <tr>
                            <!-- print name -->
                            <td><b>Pasword:</b></td>
                            <td>

                                <input type="text" value="<?php echo $row['PAsword']; ?>" disabled>
                            </td>
                        </tr>


                    </table>

                    </form>
            <?php
                }
            }

            ?>






            <!-- edit student info -->
            <?php
            if (isset($_POST['edit_student'])) {

            ?>
                <center>
                    <form action="" method="post">
                        Enter Student Id:
                        <input type="text" name="Student_id">
                        <input type="submit" name="search_by_roll_no_edit" value="search">
                    </form>
                </center>

                <?php

            }
            if (isset($_POST['search_by_roll_no_edit'])) {
                $Student_id = $_POST['Student_id'];

                $query = "SELECT * FROM student WHERE Sudent_id='$_POST[Student_id]'";

                // এখানে mysqli_query() দিয়ে SQL Query-টি database-এ execute করা হচ্ছে।
                $query_run = mysqli_query($connection, $query);

                if (mysqli_num_rows($query_run) > 0) {

                    //    এখানে mysqli_fetch_assoc() database থেকে একটি row নিয়ে associative array তৈরি করে।
                    $row = mysqli_fetch_assoc($query_run);
                ?>
                    <!-- show data display -->

                    <form action="admin_edit_sstudent.php" method="post">
                        <table>

                            <tr>
                                <!-- print name -->
                                <td><b>Name:</b></td>
                                <td>

                                    <input type="text" name="name" value="<?php echo $row['Name']; ?>">
                                </td>
                            </tr> <br>

                            <tr>
                                <td><b>Roll No:</b></td>
                                <td>
                                    <input type="text" name="student_id" value="<?php echo $row['Sudent_id']; ?> " readonly>
                                </td>
                            </tr>


                            <tr>
                                <!-- print name -->
                                <td><b>Email:</b></td>
                                <td>

                                    <input type="text" name="email" value="<?php echo $row['Email']; ?>">
                                </td>
                            </tr> <br>


                             <tr>
                               
                                <td><b>Pasword:</b></td>
                                <td>

                                    <input type="text" name="pasword" value="<?php echo $row['PAsword']; ?>">
                                </td>
                            </tr> <br> 


                            <tr>
                                <td></td>
                                <td><input type="submit" name="edit" value="save"></td>
                            </tr>


                        </table>

                    </form>
            <?php
                }
            }

            ?>





<!-- add new student -->
           <?php 
           if(isset($_POST['add_new_student']))
            {
                ?>
                <center>
                    <h4>Fill the given deatils</h4>
                    <form action="add_student.php" method="post">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td>
                                    <input type="text" name="name" value="">
                                </td>
                            </tr>

                            <tr>
                                <td>Student_id:</td>
                                <td>
                                    <input type="text" name="student_id" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>
                                    <input type="text" name="email" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Pasword:</td>
                                <td>
                                    <input type="text" name="pasword" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="Add" value="Add Student">
                                </td>
                            </tr>
                        </table>


                    </form>
                </center>
                <?php
            }
           
           ?>

           <!-- delete info -->

           
            <!-- edit student info -->
            <?php
            if (isset($_POST['delete_student'])) {

            ?>
                <center>
                    <form action="delete_student.php" method="post">
                        Enter Student Id:
                        <input type="text" name="Student_id">
                        <input type="submit" name="search_by_roll_no_edit" value="search">
                    </form>
                </center>

                <?php

            }
            if (isset($_POST['search_by_roll_no_edit'])) {
                $Student_id = $_POST['Student_id'];

                $query = "SELECT * FROM student WHERE Sudent_id='$_POST[Student_id]'";

                // এখানে mysqli_query() দিয়ে SQL Query-টি database-এ execute করা হচ্ছে।
                $query_run = mysqli_query($connection, $query);

                if (mysqli_num_rows($query_run) > 0) {

                    //    এখানে mysqli_fetch_assoc() database থেকে একটি row নিয়ে associative array তৈরি করে।
                    $row = mysqli_fetch_assoc($query_run);
                ?>
                    <!-- show data display -->

                    <form action="admin_edit_sstudent.php" method="post">
                        <table>

                            <tr>
                                <!-- print name -->
                                <td><b>Name:</b></td>
                                <td>

                                    <input type="text" name="name" value="<?php echo $row['Name']; ?>">
                                </td>
                            </tr> <br>

                            <tr>
                                <td><b>Roll No:</b></td>
                                <td>
                                    <input type="text" name="student_id" value="<?php echo $row['Sudent_id']; ?> " >
                                </td>
                            </tr>


                            <tr>
                                <!-- print name -->
                                <td><b>Email:</b></td>
                                <td>

                                    <input type="text" name="email" value="<?php echo $row['Email']; ?>">
                                </td>
                            </tr> <br>


                             <tr>
                               
                                <td><b>Pasword:</b></td>
                                <td>

                                    <input type="text" name="pasword" value="<?php echo $row['PAsword']; ?>">
                                </td>
                            </tr> <br> 


                            <tr>
                                <td></td>
                                <td><input type="submit" name="edit" value="save"></td>
                            </tr>


                        </table>

                    </form>
            <?php
                }
            }

            ?>
            

        </div>


    </div>
</body>

</html>