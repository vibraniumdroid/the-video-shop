<html>
<body>

<form action="rent_video.php" method="post" required>
  <input type="number" name="video_ID" placeholder="VID#" required>
  <br>
  <input type="number" name="cust_ID" placeholder="CIN#" required>
  <br>
  <input type="date" name="rent_to" min="<?= date('Y-m-d'); ?>" placeholder="Rent until (YYYY-MM-DD)" required>
  <br>
  <button type="submit" name="submit">Rent</button>
</form>

</body>
</html>

<?php
# Name: Abdallah Abuhamda
# Date: 2022-11-23
# Course: CIS276DA
# Professor: Jong-beum Yoon
?>
