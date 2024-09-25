<?php
require("./BookPresentation.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>library</title>
</head>

<body>
  <h1>View the available books</h1>
  <form method="post">
    <button name="View">View</button>
  </form>
  <?
  if (isset($_POST["View"])) {
    $bookPresentation = new BookPresentation();
    $bookPresentation->viewAvailableBooksWeb();
  } ?>
</body>

</html>
