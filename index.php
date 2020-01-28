<?php
    $host = '127.0.0.1';
    $db   = 'netland';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    echo $pdo->query('select version()')->fetchColumn();
    
    echo "<br/> <br/> <br/>" . "series" . "<br/>";

    $stmt = $pdo->query('SELECT * FROM netland.series;');
    while ($row = $stmt->fetch())
    {
        echo "<br/>". $row['title'] . " rating " . $row['rating'] ;
    }

    echo "<br/> <br/> <br/>" . "movies" . "<br/>";

    $stmt = $pdo->query('SELECT * FROM netland.movies;');
    while ($row = $stmt->fetch())
    {
        echo "<br/>". $row['title'] . " duur " .$row['duur'];
    }

    ?>