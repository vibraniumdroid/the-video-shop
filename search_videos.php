<?php
# Searches for videos

require_once "video_store_pdo.php";

$dbh = video_store_connect ();

$search = $_POST['search'];

$stmt = "SELECT * FROM vid_info WHERE vid_title LIKE '%$search%'";

$result = $dbh->query ($stmt);

print ("<b>Results matching " . "'" . $search . "'\n</b>");

# Table
print ("<table>\n");
print ("<tr>\n");

# Table headers
print ("<table border=\"1\">\n");
print ("<th>Film Name</th>");
print ("<th>Genre</th>");
print ("<th>Description</th>");
print ("<th>Release Date</th>");
print ("<th>VID#</th>");

print ("</tr>\n");

# Loop to print table
while ($row = $result->fetch (PDO::FETCH_NUM))
{
  print ("<tr>\n");
  for ($i = 0; $i < $result->columnCount (); $i++)
  {

    print ("<td>" . htmlspecialchars ($row[$i]) . "</td>\n");
  }
  print ("</tr>\n");
}

print ("</table>\n");

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
