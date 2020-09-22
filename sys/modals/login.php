<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <a type="button" class="btn btn-secondary" href="/home/">Close</a>
            </div>

            <div class="modal-body">
                <p>We need you to login before you can fully access this page.</p>

                <form action="#" method="post">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="authInputUsernameLabel">Email Address</span>
                        </div>
                        <input type="email" class="form-control" id="authInputUsername" name="authInputUsername" aria-describedby="authInputUsernameLabel" required />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="authInputPasswordLabel">Password</span>
                        </div>
                        <input type="password" class="form-control" id="authInputPassword" name="authInputPassword" aria-describedby="authInputPasswordLabel" required />
                    </div>
                    
                    <br>

                    <button class="btn btn-primary btn-block" type="submit">Login</button>


                </form>

            </div>

        </div>
    </div>
</div>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {



    include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

    $email = '';
    $password = '';
    $r = '';
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = validate($_POST["authInputUsername"]);
    $password = validate($_POST["authInputPassword"]);

    // IF VALID RE-SET VARIABLE
    

    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.**
    if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['authInputUsername']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        // If the username exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($_POST['authInputPassword'], $password)) {
                // Verification success! User has loggedin!
                // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['id'] = $id;
                // $_SESSION['sessionID'] = '';
                echo '<script type="text/javascript">location.reload();</script>';
                exit;
            } else {
                echo "<script>alert('Wrong Password!');</script>";
                echo '<script type="text/javascript">location.reload();</script>';
                exit;
            }
        } else {
            echo "<script>alert('Incorrect Username!');</script>";
            echo '<script type="text/javascript">location.reload();</script>';
            exit;
        }
    } else {
        echo "<script>alert('An error has occured!');</script>";
        echo '<script type="text/javascript">location.reload();</script>';
        exit;
    }

}
?>