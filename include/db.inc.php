<?php

 $mysql_host = 'localhost';
            $mysql_user = 'root';
            $mysql_password = '';
            $db_name = 'student';

             @$con = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $db_name) or die("can't connect to the database.");

