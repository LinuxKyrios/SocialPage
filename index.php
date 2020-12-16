<?php
    session_start();
    require_once 'header.php';

    echo "<div class='center'>Welcome in Linux Kyrios Book.";

    if ($loggedin) echo " $user, you are logged in.";
    else           echo "Register or log in.";

    echo <<<_END
        </div><br>
    </div>
    <div data-role="folder">
        <h4>Training application in PHP, MySQL and JavaScript with frameworks</h4>
    </div>
    </body>
</html>
_END;
?>
