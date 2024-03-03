<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'paricomm_admin');
define('DB_PASSWORD', 'qYV@WKJA])yk');
define('DB_DATABASE', 'paricomm_playdooh');

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'paricomm_vr');
// define('DB_PASSWORD', '4q8G%r+8++#r');
// define('DB_NAME', 'paricomm_playdooh');


// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_DATABASE', 'playdooh');

  /* Connect to MySQL and select the database. */
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

?>