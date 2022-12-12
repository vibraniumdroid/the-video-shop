# Creates video table for video store project

# Information specific to rentals will be found
# in a seperate rental table.

# Rental table should also be linked with 
# video_ID as a foreign key

# Changes will be made in later stages of project

DROP TABLE IF EXISTS vid_info;
#@ _CREATE_TABLE_
CREATE TABLE vid_info
(
  vid_title VARCHAR(100) NOT NULL,
  vid_genre VARCHAR(100) NULL,
  vid_desc  VARCHAR(1000) NULL,
  release_date DATE NOT NULL,
  video_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (video_ID)
  
);
#@ _CREATE_TABLE_