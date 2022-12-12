<?php
# Dumps customers

require_once "video_store_pdo.php";

$title = "All Video Shop Customers";
html_begin ($title, $title);

$dbh = video_store_connect ();

$stmt = "SELECT *"
      . " FROM customers_all";
$sth = $dbh->query ($stmt);

# Table
print ("<table>\n");
print ("<tr>\n");
print ("<table border=\"1\">\n");

# Table headers
print ("<th>CIN#</th>");
print ("<th>Name</th>");
print ("<th>Email</th>");
print ("<th>Phone</th>");
print ("<th>Address</th>");

print ("</tr>\n");


# Loop to print table
while ($row = $sth->fetch (PDO::FETCH_NUM))
{
  print ("<tr>\n");           # begin table row
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
