<?php

mysql_connect(
    "localhost",
    "root",
    "password"
);

mysql_query(
    "SELECT * FROM users"
);


create_function(
    '$name',
    'return $name;'
);