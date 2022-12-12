<?php

require_once "video_store_pdo.php";
$dbh = video_store_connect ();

$rental_ID = $_POST['rental_ID'];

# Counts instances of user entered rental_ID
$sth = $dbh->query ("SELECT COUNT(*) FROM rental WHERE rental_ID = $rental_ID");
$count = $sth->fetchColumn (0);

# Records date_checked_in based on a user entered rental_ID
$sth2 = $dbh->query ("SELECT date_checked_in FROM rental WHERE rental_ID = $rental_ID");
$count2 = $sth2->fetchColumn (0);

# Only returns when rental_ID is valid AND video has not been checked in already
if ($count > 0 && $count2 === NULL) {

  # For late and on time returns
  $sql = "UPDATE rental
            SET rental_fees = TIMESTAMPDIFF(DAY, date_checked_out, CURDATE()) * 3.75, date_checked_in = CURDATE()
            WHERE rental_ID = $rental_ID AND TIMESTAMPDIFF(DAY, date_due, CURDATE()) >= 0;";

  $dbh->query($sql);

  # For early returns
  $sql2 = "UPDATE rental
            SET rental_fees = TIMESTAMPDIFF(DAY, date_checked_out, date_due) * 3.75, date_checked_in = CURDATE()
            WHERE rental_ID = $rental_ID AND TIMESTAMPDIFF(DAY, date_due, CURDATE()) < 0;";

  $dbh->query($sql2);

  # Get video title
  $sth3 = $dbh->query ("SELECT vid_title FROM renting_customers_one WHERE rental_ID = $rental_ID");
  $video_rented = $sth3->fetchColumn (0);

  # Get fees
  $sth4 = $dbh->query ("SELECT rental_fees FROM renting_customers_one WHERE rental_ID = $rental_ID");
  $rental_fee = $sth4->fetchColumn (0);

  print ("You returned '" . $video_rented . "'. Your fees are $" . $rental_fee . ".");

} else {
  print("Error! Please check your Return # and ensure that your video has not already been checked in.\n");
}
$dbh = NULL;
?>

<html>
<body>

<p>
<a href="index.php">Homepage</a>.
</p>

</body>
</html>

<?php
# Name: Abdallah Abuhamda
# Date: 2022-11-23
# Course: CIS276DA
# Professor: Jong-beum Yoon
?>
