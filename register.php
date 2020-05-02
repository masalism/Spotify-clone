<?php
include "includes/classes/Account.php";
include "includes/classes/Constants.php";

$account = new Account();

include "includes/handlers/login-handler.php";
include "includes/handlers/register-handler.php";

function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Slotify!</title>
</head>

<body>
    <div id="inputContainer">
        <form action="register.php" id="loginForm" method="POST">
            <h2>Login to your Account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="loginUsername" placeholder="e.g. bartSimpson" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="loginPassword" required placeholder="Your password">
            </p>
            <button type="submit" name="loginButton">LOG IN</button>
        </form>

        <form action="register.php" id="registerForm" method="POST">
            <h2>Create your free account</h2>
            <p>
                <?php echo $account->getError(Constants::$usernameCharacters) ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="e.g. bartSimpson" required value="<?php getInputValue('username') ?>">
            </p>
            <p>
                <?php echo $account->getError(Constants::$firstNameCharacters) ?>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="e.g. Bart" required value="<?php getInputValue('firstName') ?>">
            </p>
            <p>
                <?php echo $account->getError(Constants::$lastNameCharacters) ?>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="e.g. Simpson" required value="<?php getInputValue('lastName') ?>">
            </p>
            <p>
                <?php echo $account->getError(Constants::$emailsDoNotMatch) ?>
                <?php echo $account->getError(Constants::$emailInvalid) ?>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="e.g. bart@gmail.com" required value="<?php getInputValue('email') ?>">
            </p>
            <p>
                <label for="email2">confirm email</label>
                <input type="email" id="email2" name="email2" placeholder="e.g. bart@gmail.com" required value="<?php getInputValue('email2') ?>">
            </p>
            <p>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
                <?php echo $account->getError(Constants::$passwordNotAlphaNumeric) ?>
                <?php echo $account->getError(Constants::$passwordCharacters) ?>
                <label for="password">Password</label>
                <input placeholder="Your password" type="password" id="password" name="password" required>
            </p>
            <p>
                <label for="password2">Confirm password</label>
                <input placeholder="Your password" type="password" id="password2" name="password2" required>
            </p>
            <button type="submit" name="registerButton">SIGN UP</button>
        </form>
    </div>

</body>

</html>