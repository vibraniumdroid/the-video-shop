# Creates rental table for video store project
# Creates foreign key relationship with vid_info
# table via video_ID
# Amended to include rental_ID as primary key
# Amended to include foreign keys 
# Changes will be made in later stages of project

DROP TABLE IF EXISTS rental;
#@ _CREATE_TABLE_
CREATE TABLE rental
(
  date_checked_out DATE NULL,	# Date rented
  date_checked_in DATE NULL,	# Date returned
  date_due DATE NULL,			# Date due
  rental_fees DECIMAL(19,4) NULL,
  vid_cost_per_day DECIMAL(19,4) NULL,
  video_ID INT UNSIGNED NOT NULL,
  cust_ID INT UNSIGNED NOT NULL,
  rental_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (rental_ID),
  FOREIGN KEY (video_ID) REFERENCES vid_info (video_ID),
  FOREIGN KEY (cust_ID) REFERENCES cust_info (cust_ID)
);
#@ _CREATE_TABLE_