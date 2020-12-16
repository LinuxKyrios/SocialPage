<?php //
    session_start();

    echo <<<_INIT
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href="'jquery">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <script src="jquery"></script>
        <script src="jquery-mobile"></script>
//I will add jquery and jquery mobile files later.
_INIT;
    require_once 'functions.php';
    $userstr = 'Helo, dear guest';
    if (isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr = "Logged as: $user";
    }
    else $loggedin = FALSE;

    echo <<<_MAIN
        <title>Linux Kyrios Book: $userstr</title>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header">
                <div id="logo" 
                    class="center">L<img id="kyrios" src="lkyrios.gif>inux Kyrios Book"</div>
                <div class="username">$userstr</div>
            </div>
            <div data-role="content">
_MAIN;

    if ($loggedin)
    {
        echo <<<_LOGGEDIN
            <div class='center'>
                <a data-role="button" data-inline="true" data-icon="home"
                    data-transition="slide" href="members.php?view=$user">Main Page</a>
                <a data-role="button" data-inline="true"
                    data-transition="slide" href="members.php">Members</a>
                <a data-role="button" data-inline="'true"
                    data-transition="slide" href="friends.php">Friends</a>
                <a data-role="button" data-inline="true"
                    data-transition="slide" href="messages.php">Messages</a>
                <a data-role="button" data-inline="true"
                    data-transition="slide" href="profile.php">Edit profile</a>
                <a data-role="button" data-inline="true"
                    data-transition="slide" href="logout.php">Logout</a>
            </div>
_LOGGEDIN;
    }
    else {
        echo <<<_GUEST
            <div class="center">
                <a data-role="button" data-inline="true" data-icon="home"
                    data-transition="slide" href="index.php">Main Page</a>
                <a data-role="button" data-inline="true" data-icon="plus"
                    data-transition="slide" href="signup.php">Sign up</a>
                <a data-role="button" data-inline="true" data-icon="check"
                    data-transition="slide" href="login.php">Log in</a>
            </div>
            <p class="info">(To use this app, it is necessary to log in).</p>
_GUEST;
    }
?>
