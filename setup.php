//It is necessary to open this file before reference to other pages, otherwise, you will receive huge amount of MySQL errors
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preparing database</title>
</head>
<body>
    <h3>Configuring</h3>
    <?php
        require_once 'functions.php';
        createTable('members',
                    'user VARCHAR(16), 
                    pass VARCHAR(16), 
                    INDEX(user(6))');
        createTable('messages',
                    'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    auth VARCHAR(16),
                    recip VARCHAR(16),
                    pm CHAR(1),
                    time INT UNSIGNED,
                    message VARCHAR(4096),
                    INDEX(auth(6)),
                    INDEX(recip(6))');
        createTable('friends',
                    'user VARCHAR(16), 
                    friend VARCHAR(16),
                    INDEX(user(6)), 
                    INDEX(friend(6))');
        createTable('members',
                    'user VARCHAR(16), 
                    pass VARCHAR(4096), 
                    INDEX(user(6))');
    ?>
    <br>...done.
</body>
</html>
