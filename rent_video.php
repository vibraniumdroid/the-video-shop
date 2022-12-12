<?php

require_once "video_store_pdo.php";
$dbh = video_store_connect ();

$video_ID = $_POST['video_ID'];
$cust_ID = $_POST['cust_ID'];
$rent_to = $_POST['rent_to'];

# Trims '-' character from date so it can be passed to rental table
$trim_date = str_replace('-', '', $rent_to);

/*
Various print statements for troubleshooting (ignore)
print ("VID#: '". $video_ID . "' ");
print ("CID#: '". $cust_ID . "' ");
print ("Date: '". $trim_date . "' ");
*/

# Counts instances of user entered video_ID in available_titles
$sth = $dbh->query ("SELECT COUNT(*) FROM available_titles WHERE video_ID = $video_ID");
$count = $sth->fetchColumn (0);

# Counts instances of user entered cust_ID in cust_info
$sth2 = $dbh->query ("SELECT COUNT(*) FROM cust_info WHERE cust_ID = $cust_ID");
$count2 = $sth2->fetchColumn (0);

# Only inserts when video is available and customer id is valid
if ($count > 0 && $count2 > 0) {

  $sql = "INSERT INTO rental VALUES (CURDATE(), NULL, $trim_date, 'NOT LATE', NULL, $video_ID, $cust_ID, NULL);";
  $dbh->query($sql);

  $sth3 = $dbh->query ("SELECT vid_title FROM vid_info WHERE video_ID = $video_ID");
  $video_rented = $sth3->fetchColumn (0);

  print ("You rented '" . $video_rented . "' until " . $rent_to . "!");

} else {
  # Error msg
  print("Error! Please check your VID# and CID#.\n");
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
