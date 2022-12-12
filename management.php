<?php
# Management homepage

require_once "video_store_pdo.php";

$title = "Management";
html_begin ($title, $title);
?>


<p>
<b>Staff Only</b>
</p>

<p>
View customers with past due rentals <a href="dump_late_customers.php">here</a>.
</p>

<p>
View all customers <a href="dump_customers.php">here</a>.
</p>

<p>
Search customers <a href="search_customer_box.html">here</a>.
</p>

<p>
View all rentals <a href="dump_rentals.php">here</a>.
</p>

<?php
html_end ();
# Name: Abdallah Abuhamda
# Date: 2022-11-23
# Course: CIS276DA
# Professor: Jong-beum Yoon
?>
