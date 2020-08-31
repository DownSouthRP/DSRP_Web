<!-- DOWNSOUTHRP.COM -->
<!-- CREATED BY THE DOWNSOUTHRP DEVELOPMENT DIVISION -->

<?php
$host = $_SERVER['SERVER_NAME'];

if($_SERVER['SERVER_NAME'] !== 'dev.downsouthrp.com') {
    echo '<script type="text/javascript">location.href = "/home";</script>';
}

?>


<form action="#" method="post">
    <input type="password" id="pass" name="pass" placeholder='web pass' required/>
    <button type="submit">get access</button>
</form>


<?php
$pass = $_POST['pass'];

if($pass == 'dev2020') {
    echo '<script type="text/javascript">location.href = "/home";</script>'; 
} else {
    echo "<script>alert('Incorrect pass!');</script>";
}


?>
