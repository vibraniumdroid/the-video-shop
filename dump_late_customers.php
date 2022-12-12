<?php
# Dumps late customers

require_once "video_store_pdo.php";

$title = "Past Due Rentals";
html_begin ($title, $title);

$dbh = video_store_connect ();

$stmt = "SELECT *"
      . " FROM renting_customers_one
WHERE late_status = 'LATE' AND date_checked_in IS NULL;";

$sth = $dbh->query ($stmt);

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
# Name: Abdallah Abuhamda
# Date: 2022-11-23
# Course: CIS276DA
# Professor: Jong-beum Yoon
?>
