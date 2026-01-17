<?php
require('../connect.php');
session_start();

if (isset($_POST['admin_login'])) {
    $stmt = $conn->prepare("SELECT * FROM tbladmin WHERE username = ?");
    $stmt->bind_param("s", $_POST['admin_username']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 1) {
        $result_fetch = $result->fetch_assoc();
        // If password is hashed, use password_verify. If not, use direct comparison.
        if (
            (password_get_info($result_fetch['password'])['algo'] !== 0 && password_verify($_POST['admin_password'], $result_fetch['password']))
            || ($_POST['admin_password'] === $result_fetch['password'])
        ) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $result_fetch['username'];
            $admin_login_success = true;
        } else {
            $admin_login_failed = true;
        }
    } else {
        $admin_login_failed = true;
    }
}

if(isset($_POST['student_login'])) {
    $stmt = $conn->prepare("SELECT * FROM tblstudent WHERE stud_email = ? OR stud_username = ?");
    $stmt->bind_param("ss", $_POST['student_username'], $_POST['student_username']);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result && $result->num_rows == 1) {
        $result_fetch = $result->fetch_assoc();
        if(password_verify($_POST['student_password'], $result_fetch['stud_password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $result_fetch['stud_username'];
            $_SESSION['regno'] = $result_fetch['regno'];
            $_SESSION['name'] = $result_fetch['stud_name'];
            $_SESSION['address'] = $result_fetch['stud_address'];
            $_SESSION['gender'] = $result_fetch['stud_gender'];
            $_SESSION['email'] = $result_fetch['stud_email'];
            $_SESSION['image'] = $result_fetch['stud_image'];
            $student_login_success = true;
        } else {
            $student_login_failed = true;
        }
    } else {
        $student_not_registered = true;
    }
}

if(isset($_POST['faculty_login'])) {
    $stmt = $conn->prepare("SELECT * FROM tblfaculty WHERE fac_email = ? OR fac_username = ?");
    $stmt->bind_param("ss", $_POST['fac_username'], $_POST['fac_username']);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result && $result->num_rows == 1) {
        $result_fetch = $result->fetch_assoc();
        if(password_verify($_POST['fac_password'], $result_fetch['fac_password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $result_fetch['fac_username'];
            $_SESSION['regno'] = $result_fetch['regno'];
            $_SESSION['name'] = $result_fetch['fac_name'];
            $_SESSION['address'] = $result_fetch['fac_address'];
            $_SESSION['gender'] = $result_fetch['fac_gender'];
            $_SESSION['email'] = $result_fetch['fac_email'];
            $_SESSION['image'] = $result_fetch['fac_image'];
            $faculty_login_success = true;
        } else {
            $faculty_login_failed = true;
        }
    } else {
        $faculty_not_registered = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminlogin</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<?php if (!empty($admin_login_success)): ?>
    <script>
        swal('Good Job!', "Admin Login Successfully!", 'success').then((value) => {
            window.location.href = 'index.php';
        })
    </script>
<?php elseif (!empty($admin_login_failed)): ?>
    <script>
        swal('Error!', "Admin Login Failed!", 'error').then((value) => {
            window.location.href = '../index.php';
        })
    </script>
<?php endif; ?>

<?php if (!empty($student_login_success)): ?>
    <script>
        swal('Good Job!', "Student Login Successfully!", 'success').then((value) => {
            window.location.href = '../Student/index.php';
        })
    </script>
<?php elseif (!empty($student_login_failed)): ?>
    <script>
        swal('Error!', "Student Login Failed!", 'error').then((value) => {
            window.location.href='../index.php';
        })
    </script>
<?php elseif (!empty($student_not_registered)): ?>
    <script>
        swal('Error!', "Username and Email are not Registered", 'error').then((value) => {
            window.location.href='../index.php';
        })
    </script>
<?php endif; ?>

<?php if (!empty($faculty_login_success)): ?>
    <script>
        swal('Good Job!', "Faculty Login Successfully!", 'success').then((value) => {
            window.location.href = '../Faculty/index.php';
        })
    </script>
<?php elseif (!empty($faculty_login_failed)): ?>
    <script>
        swal('Error!', "Faculty Login Failed!", 'error').then((value) => {
            window.location.href='../index.php';
        })
    </script>
<?php elseif (!empty($faculty_not_registered)): ?>
    <script>
        swal('Error!', "Username and Email are not Registered", 'error').then((value) => {
            window.location.href='../index.php';
        })
    </script>
<?php endif; ?>
</body>

</html>