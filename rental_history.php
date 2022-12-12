<?php
# Searches for rental table entries matching a user-specified CID#

require_once "video_store_pdo.php";

$dbh = video_store_connect ();

$search = $_POST['search'];

$stmt = "SELECT * FROM renting_customers_one WHERE cust_ID = $search";
$result = $dbh->query ($stmt);

# Table
print ("<table>\n");
print ("<tr>\n");
print ("<table border=\"1\">\n");

# Table headers
print ("<th>Rental #</th>");
print ("<th>First Name</th>");
print ("<th>Last Name</th>");
print ("<th>CIN#</th>");
print ("<th>Checked Out</th>");
print ("<th>Returned</th>");
print ("<th>Due</th>");
print ("<th>Status</th>");
print ("<th>Fees#</th>");
print ("<th>Title</th>");
print ("<th>VID#</th>");

print ("</tr>\n");

# Loop to print table
while ($row = $result->fetch (PDO::FETCH_NUM))
{

  print ("<tr>\n");

  for ($i = 0; $i < $result->columnCount(); $i++)
  {



    if($row[$i] === NULL) {
      print ("<td>" . "N/A" . "</td>\n");
    } else {
      print ("<td>" . htmlspecialchars ($row[$i]) . "</td>\n");
    }

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
