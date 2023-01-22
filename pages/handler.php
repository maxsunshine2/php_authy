<?php
// session_start();
include('./config.php');
/**
 * Summary of register_user
 * @param array $user
 * @return void
 */

if (isset($_POST['lname']) && isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['pword'])) {

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo ("email is invalid, please register with another email");
    } else {
        $user = array('first_name' => $_POST['fname'], 'last_name' => $_POST['lname'], 'email' => $_POST['usmail'], 'passcode' => $_POST['pword'], 'email_code' => rand(100000, 999999));
        register_user($user);
    }

}

if (isset($_POST['usmail']) && isset($_POST['uspass'])) {

    if (!filter_var($_POST['usmail'], FILTER_VALIDATE_EMAIL)) {
        echo ("email is invalid, please login with another email");
    } else {
        $user = array('email' => $_POST['usmail'], 'passcode' => $_POST['uspass']);
        login_user($user);
    }

}

if (isset($_POST['remail'])) {

    if (!filter_var($_POST['remail'], FILTER_VALIDATE_EMAIL)) {
        echo ("email is invalid, please check email");
    } else {
        $user = array('email' => $_POST['remail']);
        recover_user_mail($user);
    }

}


if (isset($_POST['repass']) && isset($_POST['rpmail'])) {

    if (empty($_POST['repass'])) {
        echo ("password is invalid, please check password");
    } elseif (!filter_var($_POST['rpmail'], FILTER_VALIDATE_EMAIL)) {
        echo ("email is invalid, please check email");
    } else {
        $user = array('passcode' => $_POST['repass'], 'email' => $_POST['rpmail']);
        reset_user_pass($user);
    }
    // echo "received";
}

function register_user(array $user)
{
    $email = mysqli_real_escape_string($GLOBALS['conn'], $user['email']);
    $sl = "SELECT (email) from users where email = '$email' ";
    $run = mysqli_query($GLOBALS['conn'], $sl);
    if (mysqli_num_rows($run) < 1) {
        $sql = "INSERT INTO users (first_name, last_name, email, passcode, email_code) 
    VALUES (?,?,?,?,?)";
        $query = mysqli_prepare($GLOBALS['conn'], $sql);

        mysqli_stmt_bind_param($query, 'ssssi', $fname, $lname, $mail, $code, $em_code);
        $fname = mysqli_real_escape_string($GLOBALS['conn'], $user["first_name"]);
        $lname = mysqli_real_escape_string($GLOBALS['conn'], $user["last_name"]);
        $mail = mysqli_real_escape_string($GLOBALS['conn'], $user["email"]);
        $code = mysqli_real_escape_string($GLOBALS['conn'], password_hash($user["passcode"], PASSWORD_DEFAULT));
        $em_code = mysqli_real_escape_string($GLOBALS['conn'], $user["email_code"]);
        date_default_timezone_set("Africa/Lagos");
        if (mysqli_stmt_execute($query)) {
            echo ("Registeration Successful" . "</br>");
        } else {
            echo (mysqli_stmt_error($query));
        }
    } else {
        echo ("email is taken, please register with another email");
    }
}
// register_user($user);
// login($user);
/**
 * Summary of login
 * @param array $user
 * @return void
 */
function login_user(array $user)
{
    header('Content-Type: application/json');
    $sql = "SELECT * FROM users where email = ?";
    $message = array();
    $query = mysqli_prepare($GLOBALS['conn'], $sql);
    //  Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($query, "s", $user_mail);
    // Set parameters
    $user_mail = $user["email"];
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($query)) {
        // Store result
        mysqli_stmt_store_result($query);
        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($query) === 1) {
            // Bind result variables
            mysqli_stmt_bind_result($query, $id, $first_name, $last_name, $email, $passcode, $email_verified, $email_code, $session_time, $created_at, $updated_at);
            if (mysqli_stmt_fetch($query)) {

                if (password_verify($user["passcode"], $passcode)) {
                    date_default_timezone_set("Africa/Lagos");
                    $time = date("Y-m-d h:i:s");
                    $session_sql = "UPDATE users set session_time = '$time' where id = $id ";
                    $session_upd = mysqli_query($GLOBALS['conn'], $session_sql);
                    if ($session_upd) {
                        session_start();
                        $_SESSION["userlogin"] = true;
                        $_SESSION['id'] = $id;
                        $_SESSION["firstname"] = $first_name;
                        $_SESSION['lastname'] = $last_name;
                        $_SESSION['email'] = $email;
                        $_SESSION['last_login'] = $session_time;
                        $_SESSION['fullname'] = $first_name . " " . $last_name;
                        $message = "welcome back $first_name last login time was : $session_time";
                        $_SESSION['message'] = $message;
                    } else {
                        $message = mysqli_error($GLOBALS['conn']);
                    }

                } else {
                    $message = "Login details Incorrect  Check Details And Try Again";

                }
            } else {
                $message = "No User With Such Info  Check Details again";
            }
        } else {
            $message = "No User With Such Info";
        }
    }

    echo json_encode($message);
}


function recover_user_mail(array $user)
{
    header('Content-Type: application/json');
    $sql = "SELECT * FROM users where email = ?";
    $message = array();
    $query = mysqli_prepare($GLOBALS['conn'], $sql);
    //  Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($query, "s", $user_mail);
    // Set parameters
    $user_mail = $user["email"];
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($query)) {
        // Store result
        mysqli_stmt_store_result($query);
        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($query) === 1) {
            // Bind result variables
            mysqli_stmt_bind_result($query, $id, $first_name, $last_name, $email, $passcode, $email_verified, $email_code, $session_time, $created_at, $updated_at);
            if (mysqli_stmt_fetch($query)) {
                session_start();
                $_SESSION["recover"] = true;
                $message = "so close to recovering your account!";
            } else {
                $message = "No User With Such Info  Check Details again";
            }
        } else {
            $message = "No User With Such Info";
        }
    }

    echo json_encode($message);
}

function reset_user_pass(array $user)
{

    header('Content-Type: application/json');
    date_default_timezone_set("Africa/Lagos");
    $newpass = password_hash($user['passcode'], PASSWORD_DEFAULT);
    $email = $user['email'];
    $reset_sql = "UPDATE users set passcode = '$newpass' where email = '$email' ";
    $reset_upd = mysqli_query($GLOBALS['conn'], $reset_sql);
    if ($reset_upd) {
        $sql = "SELECT * FROM users where email = ?";
        $message = array();
        $query = mysqli_prepare($GLOBALS['conn'], $sql);
        //  Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($query, "s", $user_mail);
        // Set parameters
        $user_mail = $email;
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($query)) {
            // Store result
            mysqli_stmt_store_result($query);
            // Check if username exists, if yes then verify password
            if (mysqli_stmt_num_rows($query) === 1) {
                // Bind result variables
                mysqli_stmt_bind_result($query, $id, $first_name, $last_name, $email, $passcode, $email_verified, $email_code, $session_time, $created_at, $updated_at);
                if (mysqli_stmt_fetch($query)) {
                    date_default_timezone_set("Africa/Lagos");
                    $time = date("Y-m-d h:i:s");
                    $session_sql = "UPDATE users set session_time = '$time' where id = $id ";
                    $session_upd = mysqli_query($GLOBALS['conn'], $session_sql);
                    session_start();
                    $_SESSION["recover"] = false;
                    $_SESSION["userlogin"] = true;
                    $_SESSION['id'] = $id;
                    $_SESSION["firstname"] = $first_name;
                    $_SESSION['lastname'] = $last_name;
                    $_SESSION['email'] = $email;
                    $_SESSION['last_login'] = $session_time;
                    $_SESSION['fullname'] = $first_name . " " . $last_name;
                    $_SESSION['message'] = $message;
                    $message = "account recovered successfully!";
                } else {
                    $message = "No User With Such Info  Check Details again";
                }
            } else {
                $message = "No User With Such Info";
            }
        }

    }
    echo json_encode($message);

}
mysqli_close($conn);


?>