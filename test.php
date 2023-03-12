<?php

try {
  // $DBH = new PDO("sqlsrv:server=tcp:cinvacademy.database.windows.net,1433;Database=cinv", 'nickv', 'LocalWorking1#34');
  $DBH = new PDO("sqlsrv:server=tcp:cinvacademy.database.windows.net;Database=cinv", 'nickv', 'LocalWorking1#34');
  // $DBH = new PDO("dblib:host=tcp:cinvacademy.database.windows.net;dbname=cinv", 'nickv', 'LocalWorking1#34');
  // $DBH = new PDO("mssql:host=xxxx;dbname=xxxx", 'xxxx', 'xxxx');
} catch (PDOException $e) {

  echo $e->getMessage();
}
