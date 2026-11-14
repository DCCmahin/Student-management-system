<?php
// database cnnecting
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sms");
//  $Student_id = $_POST['Student_id'];
$query = "update student set Name='$_POST[name]',PAsword='$_POST[pasword]',Email='$_POST[email]' where Sudent_id='$_POST[student_id]'";
$query_run = mysqli_query($connection, $query);

?>

<script type="text/javascript">
    alert('edit succesfully')

</script>
