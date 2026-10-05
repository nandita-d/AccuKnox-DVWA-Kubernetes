<?php
$conn = new mysqli("dvwa-mysql-service", "dvwa", "p@ssw0rd", "", 3306);
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "Connected successfully\n";
    $conn->query("DROP DATABASE IF EXISTS dvwa");
    $conn->query("CREATE DATABASE dvwa");
    $conn->select_db("dvwa");
    $conn->query("CREATE TABLE users (user_id int(6),first_name varchar(15),last_name varchar(15), user varchar(15), password varchar(32),avatar varchar(70), last_login TIMESTAMP, failed_login INT(3), PRIMARY KEY (user_id));");    
    $base_dir = "/hackable/users/";
    $conn->query("INSERT INTO users VALUES
        (1,'admin','admin','admin',MD5('password'),'$base_dir/admin.jpg', NOW(), 0),
        (2,'Gordon','Brown','gordonb',MD5('abc123'),'$base_dir/gordonb.jpg', NOW(), 0),
        (3,'Hack','Me','1337',MD5('charley'),'$base_dir/1337.jpg', NOW(), 0),
        (4,'Pablo','Picasso','pablo',MD5('letmein'),'$base_dir/pablo.jpg', NOW(), 0),
        (5,'Bob','Smith','smithy',MD5('password'),'$base_dir/smithy.jpg', NOW(), 0);");
    echo "Tables created and data inserted\n";
    $result = $conn->query("SELECT user, password FROM users");
    while ($row = $result->fetch_assoc()) {
        echo $row["user"] . " - " . $row["password"] . "\n";
    }
}