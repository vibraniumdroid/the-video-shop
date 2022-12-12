<?php
# Searches for customers

require_once "video_store_pdo.php";

$dbh = video_store_connect ();

$search = $_POST['search'];

$stmt = "SELECT * FROM customers_all WHERE name LIKE '%$search%'";

$result = $dbh->query ($stmt);


print ("<b>Results matching " . "'" . $search . "'\n</b>");

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
