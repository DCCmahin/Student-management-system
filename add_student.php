<?php
// adding data in database
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sms");

$query="insert into student values('$_POST[name]',$_POST[student_id],'$_POST[email]',$_POST[pasword])";
//$query = "update student set Name='$_POST[name]',PAsword='$_POST[pasword]',Email='$_POST[email]' where Sudent_id='$_POST[student_id]'";
$query_run = mysqli_query($connection, $query);

?>

<script type="text/javascript">
    alert('edit succesfully')

</script>