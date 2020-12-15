//This file contains definitions of all project functions
<?php
    $dbhost = 'localhost';
    $dbname = 'socialpage';
    $dbuser = 'linuxkyrios';
    $dbpass = '';

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($connection->connect_error) die("critical error");
    function createTable($name, $query)
    {
        queryMysql("CREATE TABLE IF NOT EXIST $name($query)");
        echo "Table '$name' has been created or already exists.<br>";
    }
    function queryMysql($query)
    {
        global $connection;
        $result = $connection->query($query);
        if (!$result) die("critical error");
        return $result;
    }
    function destroySession()
    {
        $_SESSION=array();
        if (session_id() != "" || isset($_COOKIE[session_name()])
            setcookie(session_name(), '', time()-2592000, '/');
        session_destroy();
    }
    function sanitizeString($var)
    {
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        if (get_magic_quotes_gpc())
            $var = stripslashes($var);
        return $connection->real_escape_string($var);
    }
    function showProfile($user)
    {
        if (file_exist("$user.jpg"))
            echo "<img src='$user.jpg' style='float:left;'>";
        $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
        if ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
        }
        else echo "<p> There is nothing to watch now.</p><br>";
    }
?>