<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Artist Form</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php
session_start();
require_once('db.php');

if (isset($_REQUEST['artistname'])) {
    $artistname = stripslashes($_REQUEST['artistname']);
    $artistemail = stripslashes($_REQUEST['artistemail']);
    $artistphone = stripslashes($_REQUEST['artistphone']);
    $date = date("Y-m-d H:i:s");
    $query = "INSERT into `artist` (artistname, artistemail, artistphone, date) VALUES ('$artistname', '$artistemail', '$artistphone', '$date')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<div class='container'>
        <div class='header'><h1>Welcome to Our Site</h1></div>
        <div class='form'><h3>Your artist details submitted successfully.</h3><br/>Click here to <a href='index.php'>Go Back to Index</a></div></div>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    ?>
    <div class="container">
        <div class="header"><h1>Welcome to Our Site</h1></div>
        <div class="form">
            <h2>Artist Form</h2>
            <form name="artist_registration" action="" method="post">
                <input type="text" name="artistname" placeholder="Artist Name" required />
                <input type="email" name="artistemail" placeholder="Artist Email" required />
                <input type="text" name="artistphone" placeholder="Artist Phone" required />
                <input type="submit" name="submit" value="Submit" />
            </form>
            <br /><br />
            <a href="index.php">Back to Index</a>
        </div>
    <?php
}
?>
<div class="footer"><h6>@copyrights- 2017</h6></div>
</div>
</body>
</html>
