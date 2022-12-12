<?php
# Dumps available Video Shop videos as HTML table

require_once "video_store_pdo.php";

$title = "The Video Shop Films — In Stock";
html_begin ($title, $title);

$dbh = video_store_connect ();

$stmt = "SELECT *"
      . " FROM available_titles";
$sth = $dbh->query ($stmt);

# Table
print ("<table>\n");
print ("<tr>\n");

# Table headers
print ("<table border=\"1\">\n");
print ("<th>VID#</th>");
print ("<th>Film Name</th>");
print ("<th>Release Date</th>");
print ("<th>Genre</th>");
print ("<th>Description</th>");

print ("</tr>\n");

while ($row = $sth->fetch (PDO::FETCH_NUM))
{
  print ("<tr>\n");
  for ($i = 0; $i < $sth->columnCount (); $i++)
  {

    print ("<td>" . htmlspecialchars ($row[$i]) . "</td>\n");
  }
  print ("</tr>\n");
}

print ("</table>\n");

$dbh = NULL;

html_end ();
?>



<html>
<body>
<p>
Search titles <a href="search_video_box.html">here</a> (all).
</p>
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
