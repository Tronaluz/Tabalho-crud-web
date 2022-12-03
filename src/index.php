<?php 
  include("database/migration.php");
  include("database/database.php");
  include("routes/system.routes.php");
  $database = new Database();
  $db = $database->getDatabase();
  $migration = new MigrationDatabase($db);
  $result = $migration->createTableUser();
  $request = $_SERVER['REQUEST_URI'];
  routeManager($request, $db);
?>
