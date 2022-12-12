<?php
# Rentals homepage

require_once "video_store_pdo.php";

$title = "Rentals";
html_begin ($title, $title);
?>


<p>
<b>$3.75</b> per day, late fees apply
</p>

<p>
Browse available titles <a href="dump_avail_videos.php">here</a>.
</p>

<p>
<a href="rent_video_box.php">Rent a video</a>.
</p>

<p>
See your previous/current rentals <a href="rental_history_box.html">here</a>.
</p>

<p>
Return a video <a href="return_box.php">here</a>.
</p>

<?php
html_end ();
# Name: Abdallah Abuhamda
# Date: 2022-11-23
# Course: CIS276DA
# Professor: Jong-beum Yoon
?>
