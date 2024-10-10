<?php
session_start();

// The hashed password (generated once using password_hash() and stored securely)
// $hashed_password = '$2y$10$eImiTXuWVxfM37uY4JANjQ.HR3sRklUIbRQ7FmUC4/fV1/D5K7PDa'; // Replace this with your own hash
$hashed_password = '$2y$10$VraY1B06y1/UxhmszRXSB./f3DZogdGR44AwH7/3aNNLFwQ/DPkQa'; // Replace this with your own hash

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_password = $_POST['password'];

    // Verify the entered password against the stored hash
    if (password_verify($entered_password, $hashed_password)) {
        // If password is correct, set session variable
        $_SESSION['authenticated'] = true;
        header('Location: protected_page.php'); // Reload to display protected content
        exit();
    } else {
        $error_message = "Incorrect password. Please try again.";
    }
}

// If not authenticated, show the password prompt
if (!isset($_SESSION['authenticated'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Protected Page</title>
</head>
<body>
    <h2>Enter Password to Access the Page</h2>
    <?php if (isset($error_message)) { echo '<p style="color:red;">' . $error_message . '</p>'; } ?>
    <form action="protected_page.php" method="POST">
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
<?php
    exit(); // Stop further page loading
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Content</title>
</head>
<body>
    <h1>Welcome to the Protected Page</h1>
    <p>This content is protected by a password.</p>
    <p><a href="logout.php">Log out</a></p>
</body>
</html>
