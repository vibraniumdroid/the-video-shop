<?php
# The Video Shop homepage

require_once "video_store_pdo.php";

$title = "The Video Shop";
html_begin ($title, $title);
?>

<p>Welcome to the Video Shop!</p>

<?php
try
{
  # Counts available titles
  $dbh = video_store_connect ();
  $sth = $dbh->query ("SELECT COUNT(*) FROM available_titles");
  $count = $sth->fetchColumn (0);

  # Counts total titles
  $sth2 = $dbh->query ("SELECT COUNT(*) FROM vid_info");
  $count2 = $sth2->fetchColumn (0);

  print ("<p>We have $count of $count2 titles available to choose from.</p>");
  $dbh = NULL;  # close connection
}
catch (PDOException $e) { } # empty handler (catch but ignore errors)
?>

<p>
Browse all titles <a href="dump_videos.php">here</a>.
</p>

<p>
View rental options <a href="rentals.php">here</a>.
</p>

<p>
View management options <a href="management.php">here</a>.
</p>


<?php
html_end ();
# Name: Abdallah Abuhamda
# Date: 2022-11-23
# Course: CIS276DA
# Professor: Jong-beum Yoon
?>
