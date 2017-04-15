<?php
$page_title = "Edit Profile";
include_once "res/utils/Functions.php";
include_once "res/partials/parseProfile.php";
include_once "res/partials/parseChangePassword.php";
?>

<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="en">
<head>
    <?php
    include_once "res/partials/head.php";
    ?>
    <title>Proofreadr - For all your grammar needs</title>
    <meta name="description" content="This should contain a description about this particular page">
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <header id="header">
                <?php
                include_once "res/partials/Header.php";
                ?>
            </header>

            <!-- Section -->
            <section>


                <?php if(!(isset($_SESSION['username']) || isCookieValid($GLOBALS['pdo']))): ?>
                    <p class="lead">You are currently not signed in<br><a href="login.php">Login</a><br>
                        Not yet a member? <a href="signup.php">Sign up here</a><br>
                    </p>
                <?php else: ?>
                    <div>
                        <script>
                            setTimeout(fade_out, 5000);

                            function fade_out() {
                                $("#fadeOut").fadeOut();
                            }
                        </script>
                        <?php if(isset($result)) echo $result; ?>
                        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
                    </div>
                    <!-- CHANGE PASSWORD -->
                    <header class="major">
                        <h2>Password Management</h2>
                    </header>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="currentPasswordField">Current Password</label>
                            <input type="password" name="current_password" class="form-control"
                                   id="currentPasswordField" placeholder="Current Password">
                        </div>

                        <div class="form-group">
                            <label for="newPasswordField">New Password</label>
                            <input type="password" name="new_password" class="form-control"
                                   id="newPasswordField" placeholder="New Password">
                        </div>

                        <div class="form-group">
                            <label for="confirmPasswordField">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control"
                                   id="confirmPasswordField" placeholder="Confirm new Password">
                        </div>

                        <input type="hidden" name="hidden_id" value="<?php if(isset($id)) echo $id; ?>">
                        <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">
                        <div class="12u$">
                            <ul class="actions button-float-right">
                                <li><button name="changePasswordButton" type="submit" value="Submit" class="special">Change Password</button></li>

                            </ul>
                        </div>
                    </form>
                    <p><a href="home.php">Back</a></p>
                <?php endif ?>

            </section>
        </div>
    </div>

    <!-- Sidebar -->
    <?php
    include_once "res/utils/Sidebar.php";
    ?>
</div>

<!-- Scripts -->
<?php
include_once "res/partials/script-calls.php";
?>
</body>
</html>